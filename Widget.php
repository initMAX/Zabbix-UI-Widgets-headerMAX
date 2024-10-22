<?php
/*
** initMAX
** Copyright (C) 2021-2022 initMAX s.r.o.
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 3 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/

namespace Modules\Header;


use Zabbix\Core\CWidget;

class Widget extends CWidget 
{
	// Font styles
	public const FONT_STYLE_BOLD = 0;
	public const FONT_STYLE_ITALIC = 1;
	public const FONT_STYLE_UNDERLINE = 2;

	// Text alignment
	public const TEXT_ALIGN_LEFT = 0;
	public const TEXT_ALIGN_CENTER = 1;
	public const TEXT_ALIGN_RIGHT = 2;

    public function getDefaultName(): string {
		return _('headerMAX');
	}
}
