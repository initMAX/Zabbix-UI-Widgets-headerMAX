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


namespace Modules\Header;

use Zabbix\Core\CWidget;

class Widget extends CWidget 
{
	// Font styles
	public const FONT_STYLE_BOLD = 0;
	public const FONT_STYLE_ITALIC = 1;
	public const FONT_STYLE_UNDERLINE = 2;

	// Horizontal alignment
	public const HORIZONTAL_ALIGN_NONE = -1;
	public const HORIZONTAL_ALIGN_LEFT = 0;
	public const HORIZONTAL_ALIGN_CENTER = 1;
	public const HORIZONTAL_ALIGN_RIGHT = 2;

    public function getDefaultName(): string {
		return _('headerMAX');
	}
}
