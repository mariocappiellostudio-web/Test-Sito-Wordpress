/* ==========================================================================
   ANyMA Casa Vacanze — main.js (vanilla JS, no dependencies)
   ========================================================================== */
(function () {
	"use strict";

	document.addEventListener("DOMContentLoaded", function () {
		initStickyHeader();
		initMobileMenu();
		initSmoothScroll();
		initLightbox();
		initTabs();
		initFaq();
		initGalleryFilter();
		initReviewChips();
		initLangSwitcher();
		initLazyLoad();
		initScrollReveal();
	});

	/* ---------- Sticky header ---------- */
	function initStickyHeader() {
		var header = document.getElementById("site-header");
		if (!header) return;
		var onScroll = function () {
			header.classList.toggle("scrolled", window.scrollY > 40);
		};
		onScroll();
		window.addEventListener("scroll", onScroll, { passive: true });
	}

	/* ---------- Mobile menu ---------- */
	function initMobileMenu() {
		var burger = document.getElementById("hamburger");
		var overlay = document.getElementById("mobile-overlay");
		var close = document.getElementById("mobile-close");
		if (!burger || !overlay) return;

		var open = function () {
			overlay.classList.add("is-open");
			overlay.setAttribute("aria-hidden", "false");
			burger.classList.add("is-open");
			burger.setAttribute("aria-expanded", "true");
			document.body.style.overflow = "hidden";
		};
		var shut = function () {
			overlay.classList.remove("is-open");
			overlay.setAttribute("aria-hidden", "true");
			burger.classList.remove("is-open");
			burger.setAttribute("aria-expanded", "false");
			document.body.style.overflow = "";
		};

		burger.addEventListener("click", function () {
			overlay.classList.contains("is-open") ? shut() : open();
		});
		if (close) close.addEventListener("click", shut);
		overlay.querySelectorAll("a").forEach(function (a) {
			a.addEventListener("click", shut);
		});
		document.addEventListener("keydown", function (e) {
			if (e.key === "Escape") shut();
		});
	}

	/* ---------- Smooth scroll for anchors ---------- */
	function initSmoothScroll() {
		document.querySelectorAll('a[href^="#"]').forEach(function (link) {
			link.addEventListener("click", function (e) {
				var id = link.getAttribute("href");
				if (id.length < 2) return;
				var target = document.querySelector(id);
				if (!target) return;
				e.preventDefault();
				target.scrollIntoView({ behavior: "smooth" });
			});
		});
	}

	/* ---------- Lightbox ---------- */
	function initLightbox() {
		var items = Array.prototype.slice.call(document.querySelectorAll("[data-lightbox]"));
		if (!items.length) return;

		var box = document.createElement("div");
		box.className = "lightbox";
		box.innerHTML =
			'<button class="lightbox-close" aria-label="Chiudi">&times;</button>' +
			'<button class="lightbox-nav lightbox-prev" aria-label="Precedente">&#8249;</button>' +
			'<div class="lightbox-stage"></div>' +
			'<button class="lightbox-nav lightbox-next" aria-label="Successiva">&#8250;</button>';
		document.body.appendChild(box);

		var stage = box.querySelector(".lightbox-stage");
		var current = 0;

		var render = function () {
			var el = items[current];
			stage.className = "lightbox-stage " + (el.dataset.ph || "ph-1");
			stage.textContent = el.dataset.caption || el.textContent.trim();
		};
		var show = function (i) {
			current = (i + items.length) % items.length;
			render();
			box.classList.add("is-open");
		};

		items.forEach(function (el, i) {
			el.addEventListener("click", function () { show(i); });
		});
		box.querySelector(".lightbox-close").addEventListener("click", function () { box.classList.remove("is-open"); });
		box.querySelector(".lightbox-prev").addEventListener("click", function () { show(current - 1); });
		box.querySelector(".lightbox-next").addEventListener("click", function () { show(current + 1); });
		box.addEventListener("click", function (e) { if (e.target === box) box.classList.remove("is-open"); });
		document.addEventListener("keydown", function (e) {
			if (!box.classList.contains("is-open")) return;
			if (e.key === "Escape") box.classList.remove("is-open");
			if (e.key === "ArrowLeft") show(current - 1);
			if (e.key === "ArrowRight") show(current + 1);
		});
	}

	/* ---------- Tabs ---------- */
	function initTabs() {
		document.querySelectorAll(".tabs").forEach(function (tabs) {
			var btns = tabs.querySelectorAll(".tab-btn");
			var panels = tabs.querySelectorAll(".tab-panel");
			btns.forEach(function (btn) {
				btn.addEventListener("click", function () {
					var target = btn.dataset.tab;
					btns.forEach(function (b) { b.classList.toggle("is-active", b === btn); });
					panels.forEach(function (p) { p.classList.toggle("is-active", p.dataset.panel === target); });
				});
			});
		});
	}

	/* ---------- FAQ accordion ---------- */
	function initFaq() {
		document.querySelectorAll(".faq-item").forEach(function (item) {
			var q = item.querySelector(".faq-q");
			var a = item.querySelector(".faq-a");
			if (!q || !a) return;
			q.addEventListener("click", function () {
				var isOpen = item.classList.toggle("is-open");
				q.setAttribute("aria-expanded", isOpen ? "true" : "false");
				a.style.maxHeight = isOpen ? a.scrollHeight + "px" : null;
			});
		});
	}

	/* ---------- Gallery filter ---------- */
	function initGalleryFilter() {
		var filters = document.querySelectorAll(".gallery-filters .filter-btn");
		var items = document.querySelectorAll(".gallery-masonry .gallery-item");
		if (!filters.length) return;
		filters.forEach(function (btn) {
			btn.addEventListener("click", function () {
				var cat = btn.dataset.filter;
				filters.forEach(function (b) { b.classList.toggle("is-active", b === btn); });
				items.forEach(function (item) {
					var match = cat === "all" || item.dataset.category === cat;
					item.classList.toggle("hide", !match);
				});
			});
		});
	}

	/* ---------- Review chips ---------- */
	function initReviewChips() {
		var chips = document.querySelectorAll(".review-chips .chip");
		var cards = document.querySelectorAll(".reviews-page-grid .review-card");
		if (!chips.length) return;
		chips.forEach(function (chip) {
			chip.addEventListener("click", function () {
				var f = chip.dataset.filter;
				chips.forEach(function (c) { c.classList.toggle("is-active", c === chip); });
				cards.forEach(function (card) {
					var match = f === "all" ||
						card.dataset.platform === f ||
						card.dataset.stars === f;
					card.classList.toggle("hide", !match);
				});
			});
		});
	}

	/* ---------- Language switcher (visual toggle) ---------- */
	function initLangSwitcher() {
		document.querySelectorAll(".lang-btn").forEach(function (btn) {
			btn.addEventListener("click", function () {
				document.querySelectorAll(".lang-btn").forEach(function (b) {
					var active = b === btn;
					b.classList.toggle("is-active", active);
					b.setAttribute("aria-pressed", active ? "true" : "false");
				});
				document.documentElement.setAttribute("lang", btn.dataset.lang || "it");
			});
		});
	}

	/* ---------- Lazy load images (IntersectionObserver) ---------- */
	function initLazyLoad() {
		var lazies = document.querySelectorAll("img[data-src]");
		if (!lazies.length) return;
		if (!("IntersectionObserver" in window)) {
			lazies.forEach(function (img) { img.src = img.dataset.src; });
			return;
		}
		var io = new IntersectionObserver(function (entries, obs) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					var img = entry.target;
					img.src = img.dataset.src;
					img.removeAttribute("data-src");
					obs.unobserve(img);
				}
			});
		}, { rootMargin: "200px" });
		lazies.forEach(function (img) { io.observe(img); });
	}

	/* ---------- Scroll reveal (fade-up) ---------- */
	function initScrollReveal() {
		var els = document.querySelectorAll(".reveal");
		if (!els.length) return;
		if (!("IntersectionObserver" in window)) {
			els.forEach(function (el) { el.classList.add("is-visible"); });
			return;
		}
		var io = new IntersectionObserver(function (entries, obs) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add("is-visible");
					obs.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12 });
		els.forEach(function (el) { io.observe(el); });
	}
})();
