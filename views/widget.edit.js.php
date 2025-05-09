<?php declare(strict_types = 0);
/*
** Copyright (C) 2001-2024 initMAX s.r.o.
**
** This program is free software: you can redistribute it and/or modify it under the terms of
** the GNU Affero General Public License as published by the Free Software Foundation, version 3.
**
** This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
** without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
** See the GNU Affero General Public License for more details.
**
** You should have received a copy of the GNU Affero General Public License along with this program.
** If not, see <https://www.gnu.org/licenses/>.
**/


?>//<script>

window.widget_header_form = new class {
	#form = undefined;

	init() {
		this.#form = document.getElementById('widget-dialogue-form');

		for (const colorpicker of this.#form.querySelectorAll('.<?= ZBX_STYLE_COLOR_PICKER ?> input')) {
			$(colorpicker).colorpicker({
				appendTo: '.overlay-dialogue-body',
				use_default: true,
				onUpdate: window.setIndicatorColor
			});
		}

		this.addLogo();
	}

	addLogo() {
		const el = document.createElement('div');
		el.classList.add('initmax-free');

		this.#form.insertBefore(el, this.#form.firstChild);
	}
};
