/**
 * SpinesTech Chatbot — assets/js/chatbot.js
 * Vanilla JS فقط، بدون أي مكتبات خارجية.
 * بيقرأ البيانات جاهزة من window.stChatbotData (مطبوعة من template-parts/chatbot.php)
 *
 * Boot is deferred until window load + idle so it stays off the LCP path.
 */
(function () {
	'use strict';

	function stChatbotBoot() {
	var DATA = window.stChatbotData;
	if (!DATA) {
		return;
	}

	var root = document.querySelector('[data-st-chatbot]');
	if (!root) {
		return;
	}

	/* ---------------------------------------------------------------------
	   عناصر DOM
	   --------------------------------------------------------------------- */
	var launcher = root.querySelector('[data-st-chatbot-launcher]');
	var badge = root.querySelector('[data-st-chatbot-badge]');
	var teaser = root.querySelector('[data-st-chatbot-teaser]');
	var teaserText = root.querySelector('[data-st-chatbot-teaser-text]');
	var teaserClose = root.querySelector('[data-st-chatbot-teaser-close]');
	var windowEl = root.querySelector('[data-st-chatbot-window]');
	var titleEl = root.querySelector('[data-st-chatbot-title]');
	var subtitleEl = root.querySelector('[data-st-chatbot-subtitle]');
	var closeBtn = root.querySelector('[data-st-chatbot-close]');
	var restartBtn = root.querySelector('[data-st-chatbot-restart]');
	var body = root.querySelector('[data-st-chatbot-body]');
	var messagesEl = root.querySelector('[data-st-chatbot-messages]');
	var form = root.querySelector('[data-st-chatbot-form]');
	var input = root.querySelector('[data-st-chatbot-input]');
	var footnote = root.querySelector('[data-st-chatbot-footnote]');

	var requiredEls = [launcher, teaser, teaserText, teaserClose, windowEl, titleEl, subtitleEl, closeBtn, restartBtn, body, messagesEl, form, input, footnote];
	for (var i = 0; i < requiredEls.length; i += 1) {
		if (!requiredEls[i]) {
			return;
		}
	}

	/* ---------------------------------------------------------------------
	   أيقونات SVG بسيطة للفئات (خطية، بدون مكتبات خارجية)
	   --------------------------------------------------------------------- */
	var ICONS = {
		building:
			'<svg viewBox="0 0 24 24" fill="none"><path d="M5 21V5a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v16M13 21V9a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v12M5 21h14M8 7h1M8 11h1M8 15h1M16 12h1M16 16h1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		wrench:
			'<svg viewBox="0 0 24 24" fill="none"><path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L4 17l3 3 5.3-5.3a4 4 0 0 0 5.4-5.4l-2.83 2.83-2.13-.7-.7-2.13L14.7 6.3Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		money:
			'<svg viewBox="0 0 24 24" fill="none"><rect x="3" y="6" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.6"/><path d="M6 6V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		folder:
			'<svg viewBox="0 0 24 24" fill="none"><path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>',
		briefcase:
			'<svg viewBox="0 0 24 24" fill="none"><rect x="3" y="7" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		phone:
			'<svg viewBox="0 0 24 24" fill="none"><path d="M6.6 10.8a13 13 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25c1.1.36 2.3.56 3.5.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.9 21 3 13.1 3 3.5A1 1 0 0 1 4 2.5h3.5a1 1 0 0 1 1 1c0 1.2.2 2.4.56 3.5a1 1 0 0 1-.25 1L6.6 10.8Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>',
		back:
			'<svg viewBox="0 0 24 24" fill="none"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		chat:
			'<svg viewBox="0 0 24 24" fill="none"><path d="M4 12.5C4 7.8 7.8 4 12.5 4S21 7.8 21 12.5 17.2 21 12.5 21c-1.5 0-2.9-.4-4.1-1l-3.9 1 1.1-3.7A8.5 8.5 0 0 1 4 12.5Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>',
	};
	function icon(key) {
		return ICONS[key] || ICONS.chat;
	}

	/* ---------------------------------------------------------------------
	   حالة المحادثة
	   --------------------------------------------------------------------- */
	var state = {
		isOpen: false,
		activeCategory: null,
		askedIds: [],
	};

	var STORAGE_KEY = 'st_chatbot_teaser_seen';

	/* ---------------------------------------------------------------------
	   ضبط النصوص الثابتة
	   --------------------------------------------------------------------- */
	titleEl.textContent = DATA.window_title;
	subtitleEl.textContent = DATA.window_subtitle;
	teaserText.textContent = DATA.teaser_text;
	footnote.textContent = DATA.end_note;
	launcher.setAttribute('aria-label', DATA.launcher_label);
	input.setAttribute('placeholder', DATA.input_placeholder);

	/* ---------------------------------------------------------------------
	   أدوات مساعدة
	   --------------------------------------------------------------------- */
	function scrollToBottom() {
		requestAnimationFrame(function () {
			body.scrollTop = body.scrollHeight;
		});
	}

	function questionsByCategory(catId) {
		return DATA.questions.filter(function (q) {
			return q.category === catId;
		});
	}

	function findCategory(catId) {
		var found = null;
		DATA.categories.forEach(function (c) {
			if (c.id === catId) found = c;
		});
		return found;
	}

	function findQuestion(qId) {
		var found = null;
		DATA.questions.forEach(function (q) {
			if (q.id === qId) found = q;
		});
		return found;
	}

	/* ---------------------------------------------------------------------
	   بناء عناصر الرسائل
	   --------------------------------------------------------------------- */
	function appendBotMessage(text) {
		var row = document.createElement('div');
		row.className = 'st-chatbot__row st-chatbot__row--bot';
		var bubble = document.createElement('div');
		bubble.className = 'st-chatbot__message st-chatbot__message--bot';
		bubble.textContent = text;
		row.appendChild(bubble);
		messagesEl.appendChild(row);
		scrollToBottom();
	}

	function appendUserMessage(text) {
		var row = document.createElement('div');
		row.className = 'st-chatbot__row st-chatbot__row--user';
		var bubble = document.createElement('div');
		bubble.className = 'st-chatbot__message st-chatbot__message--user';
		bubble.textContent = text;
		row.appendChild(bubble);
		messagesEl.appendChild(row);
		scrollToBottom();
	}

	function showTyping(callback, delay) {
		var row = document.createElement('div');
		row.className = 'st-chatbot__row st-chatbot__row--bot';
		row.setAttribute('data-typing-row', '');
		var typing = document.createElement('div');
		typing.className = 'st-chatbot__typing';
		typing.setAttribute('aria-label', DATA.typing_label);
		typing.innerHTML = '<span></span><span></span><span></span>';
		row.appendChild(typing);
		messagesEl.appendChild(row);
		scrollToBottom();

		window.setTimeout(function () {
			if (row.parentNode) {
				row.parentNode.removeChild(row);
			}
			if (typeof callback === 'function') {
				callback();
			}
		}, delay || 700);
	}

	function clearChoices() {
		var existing = messagesEl.querySelectorAll('[data-choices-block]');
		existing.forEach(function (el) {
			el.parentNode.removeChild(el);
		});
	}

	/**
	 * يبني صف من الأزرار (chips). كل عنصر { label, iconKey, variant, onClick }
	 */
	function renderChoices(items, labelText) {
		clearChoices();
		var wrap = document.createElement('div');
		wrap.className = 'st-chatbot__choices';
		wrap.setAttribute('data-choices-block', '');

		if (labelText) {
			var label = document.createElement('span');
			label.className = 'st-chatbot__choices-label';
			label.textContent = labelText;
			wrap.appendChild(label);
		}

		items.forEach(function (item) {
			var chip = document.createElement('button');
			chip.type = 'button';
			chip.className = 'st-chatbot__chip' + (item.variant ? ' st-chatbot__chip--' + item.variant : '');
			chip.innerHTML = (item.iconKey ? icon(item.iconKey) : '') + '<span>' + item.label + '</span>';
			chip.addEventListener('click', item.onClick);
			wrap.appendChild(chip);
		});

		messagesEl.appendChild(wrap);
		scrollToBottom();
	}

	/* ---------------------------------------------------------------------
	   منطق عرض الفئات / الأسئلة
	   --------------------------------------------------------------------- */
	function showCategories() {
		state.activeCategory = null;
		var items = DATA.categories.map(function (cat) {
			return {
				label: cat.label,
				iconKey: cat.icon,
				onClick: function () {
					selectCategory(cat.id);
				},
			};
		});
		renderChoices(items, DATA.categories_prompt);
	}

	function selectCategory(catId) {
		var cat = findCategory(catId);
		if (!cat) return;

		clearChoices();
		appendUserMessage(cat.label);
		state.activeCategory = catId;

		showTyping(function () {
			showQuestionsForCategory(catId, true);
		}, 550);
	}

	function showQuestionsForCategory(catId, isFirstTime) {
		var all = questionsByCategory(catId);
		var remaining = all.filter(function (q) {
			return state.askedIds.indexOf(q.id) === -1;
		});

		var items = [];

		if (remaining.length === 0) {
			appendBotMessage(DATA.no_match_message);
			remaining = all;
		}

		remaining.forEach(function (q) {
			items.push({
				label: q.q,
				onClick: function () {
					answerQuestion(q.id);
				},
			});
		});

		items.push({
			label: DATA.back_to_categories,
			iconKey: 'back',
			variant: 'ghost',
			onClick: showCategories,
		});

		renderChoices(items, isFirstTime ? null : DATA.more_in_category);
	}

	function answerQuestion(qId) {
		var q = findQuestion(qId);
		if (!q) return;

		clearChoices();
		appendUserMessage(q.q);
		if (state.askedIds.indexOf(qId) === -1) {
			state.askedIds.push(qId);
		}

		showTyping(function () {
			appendBotMessage(q.a);
			window.setTimeout(function () {
				showQuestionsForCategory(q.category, false);
			}, 250);
		}, 700);
	}

	/* ---------------------------------------------------------------------
	   البحث الحر (الكتابة في خانة الإدخال)
	   --------------------------------------------------------------------- */
	function normalize(str) {
		return (str || '').toString().trim().toLowerCase();
	}

	function scoreQuestion(query, q) {
		var terms = normalize(query).split(/\s+/).filter(Boolean);
		if (!terms.length) return 0;

		var haystack = normalize(q.q) + ' ' + (q.keywords || []).map(normalize).join(' ');
		var score = 0;
		terms.forEach(function (term) {
			if (term.length < 2) return;
			if (haystack.indexOf(term) !== -1) {
				score += 1;
			}
		});
		return score;
	}

	function handleFreeTextQuery(query) {
		clearChoices();
		appendUserMessage(query);

		showTyping(function () {
			var best = null;
			var bestScore = 0;

			DATA.questions.forEach(function (q) {
				var s = scoreQuestion(query, q);
				if (s > bestScore) {
					bestScore = s;
					best = q;
				}
			});

			if (best && bestScore > 0) {
				appendBotMessage(best.a);
				if (state.askedIds.indexOf(best.id) === -1) {
					state.askedIds.push(best.id);
				}
				window.setTimeout(function () {
					showQuestionsForCategory(best.category, false);
				}, 250);
			} else {
				appendBotMessage(DATA.no_match_message);
				window.setTimeout(showCategories, 250);
			}
		}, 750);
	}

	/* ---------------------------------------------------------------------
	   فتح / إغلاق النافذة
	   --------------------------------------------------------------------- */
	function openChat() {
		if (state.isOpen) return;
		state.isOpen = true;
		root.classList.add('is-open');
		launcher.setAttribute('aria-expanded', 'true');
		hideTeaser();
		if (badge) badge.textContent = '';

		if (!messagesEl.children.length) {
			bootstrapConversation();
		}

		window.setTimeout(function () {
			input.focus({ preventScroll: true });
		}, 350);
	}

	function closeChat() {
		if (!state.isOpen) return;
		state.isOpen = false;
		root.classList.remove('is-open');
		launcher.setAttribute('aria-expanded', 'false');
	}

	function toggleChat() {
		if (state.isOpen) {
			closeChat();
		} else {
			openChat();
		}
	}

	function restartChat() {
		messagesEl.innerHTML = '';
		state.askedIds = [];
		state.activeCategory = null;
		bootstrapConversation();
	}

	function bootstrapConversation() {
		showTyping(function () {
			appendBotMessage(DATA.welcome_message);
			window.setTimeout(showCategories, 300);
		}, 900);
	}

	/* ---------------------------------------------------------------------
	   فقاعة الترحيب التلقائية (Teaser)
	   --------------------------------------------------------------------- */
	function hideTeaser() {
		teaser.classList.remove('is-visible');
	}

	function maybeShowTeaser() {
		var alreadySeen = false;
		try {
			alreadySeen = window.sessionStorage.getItem(STORAGE_KEY) === '1';
		} catch (e) {
			alreadySeen = false;
		}
		if (alreadySeen || state.isOpen) return;

		window.setTimeout(function () {
			if (state.isOpen) return;
			teaser.classList.add('is-visible');
			try {
				window.sessionStorage.setItem(STORAGE_KEY, '1');
			} catch (e) {
				/* لو الـ sessionStorage مش متاح، تجاهل بهدوء */
			}
		}, 3200);
	}

	/* ---------------------------------------------------------------------
	   ربط الأحداث
	   --------------------------------------------------------------------- */
	launcher.addEventListener('click', toggleChat);
	closeBtn.addEventListener('click', closeChat);
	restartBtn.addEventListener('click', restartChat);
	teaserClose.addEventListener('click', function (e) {
		e.stopPropagation();
		hideTeaser();
	});
	teaser.addEventListener('click', function () {
		openChat();
	});

	form.addEventListener('submit', function (e) {
		e.preventDefault();
		var value = input.value.trim();
		if (!value) return;
		input.value = '';
		handleFreeTextQuery(value);
	});

	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && state.isOpen) {
			closeChat();
		}
	});

	document.addEventListener('click', function (e) {
		if (!state.isOpen) return;
		if (root.contains(e.target)) return;
		closeChat();
	});

	windowEl.addEventListener('click', function (e) {
		e.stopPropagation();
	});

	/* ---------------------------------------------------------------------
	   البدء
	   --------------------------------------------------------------------- */
	// Keep the assistant quiet across page navigations; users can open it from the launcher.
	}

	function startChatbot() {
		if ('requestIdleCallback' in window) {
			window.requestIdleCallback(stChatbotBoot, { timeout: 1800 });
			return;
		}

		window.setTimeout(stChatbotBoot, 0);
	}

	if (document.readyState === 'complete') {
		startChatbot();
	} else {
		window.addEventListener('load', startChatbot, { once: true });
	}
})();
