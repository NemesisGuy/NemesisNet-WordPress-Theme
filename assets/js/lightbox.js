/**
 * NemesisNet image lightbox (v2.1, F6).
 * Delegates clicks on .entry-content images into a native <dialog>.
 * Zero content changes required. Esc / backdrop click closes.
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var dialog = document.createElement('dialog');
        dialog.className = 'nemesis-lightbox';
        dialog.setAttribute('aria-label', 'Image viewer');
        dialog.innerHTML =
            '<button type="button" class="nemesis-lightbox-close" aria-label="Close">&times;</button>' +
            '<figure style="margin:0"><img alt="" /><figcaption></figcaption></figure>';
        document.body.appendChild(dialog);

        var img = dialog.querySelector('img');
        var caption = dialog.querySelector('figcaption');
        var closeBtn = dialog.querySelector('.nemesis-lightbox-close');
        var lastFocus = null;

        function close() {
            if (dialog.open) {
                dialog.close();
            }
            if (lastFocus && lastFocus.focus) {
                lastFocus.focus();
            }
        }

        function open(src, alt) {
            lastFocus = document.activeElement;
            img.src = src;
            img.alt = alt || '';
            caption.textContent = alt || '';
            caption.style.display = alt ? '' : 'none';
            if (typeof dialog.showModal === 'function') {
                dialog.showModal();
            } else {
                window.open(src, '_blank');
                return;
            }
            closeBtn.focus();
        }

        document.addEventListener('click', function (e) {
            var target = e.target;
            if (target && target.tagName === 'IMG') {
                // Content containers: single posts use .post-content,
                // pages/excerpts use .entry-content (v2.1.1: was entry-only).
                var inContent = target.closest && target.closest('.entry-content, .post-content, .page-content');
                // Skip images already linked or inside the lightbox itself.
                if (inContent && !target.closest('a') && !target.closest('dialog')) {
                    e.preventDefault();
                    var full = target.currentSrc || target.src;
                    // Prefer full-size source when srcset is present.
                    if (target.srcset && target.src) {
                        full = target.src;
                    }
                    open(full, target.alt);
                }
            }
        });

        closeBtn.addEventListener('click', close);

        dialog.addEventListener('click', function (e) {
            var rect = dialog.getBoundingClientRect();
            var inDialog =
                e.clientX >= rect.left &&
                e.clientX <= rect.right &&
                e.clientY >= rect.top &&
                e.clientY <= rect.bottom;
            if (!inDialog) {
                close();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && dialog.open) {
                close();
            }
        });
    });
})();
