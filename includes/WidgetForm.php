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


namespace Modules\Header\Includes;

use Modules\Header\Widget;
use Zabbix\Widgets\CWidgetField;
use Zabbix\Widgets\CWidgetForm;
use Zabbix\Widgets\Fields\CWidgetFieldCheckBox;
use Zabbix\Widgets\Fields\CWidgetFieldCheckBoxList;
use Zabbix\Widgets\Fields\CWidgetFieldColor;
use Zabbix\Widgets\Fields\CWidgetFieldIntegerBox;
use Zabbix\Widgets\Fields\CWidgetFieldRadioButtonList;
use Zabbix\Widgets\Fields\CWidgetFieldSelect;
use Zabbix\Widgets\Fields\CWidgetFieldTextArea;

/**
 * headerMAX widget form.
 */
class WidgetForm extends CWidgetForm
{
	public function addFields(): self
	{
		return $this
			->addField(
				(new CWidgetFieldTextArea('content', _('Content')))
					->setFlags(CWidgetField::FLAG_LABEL_ASTERISK)
			)
			->addField(
				$this->createFontSelect('font_family')
					->setDefault(3)
			)
			->addField(
				(new CWidgetFieldIntegerBox('font_size', _('Font size'), 0, 100))
					->setDefault(20)
			)
			->addField(
				new CWidgetFieldColor('font_color', _('Font color'))
			)
			->addField(
				new CWidgetFieldCheckBoxList('font_style', _('Font style'), [
					Widget::FONT_STYLE_BOLD => _('Bold'),
					Widget::FONT_STYLE_UNDERLINE => _('Underline'),
					Widget::FONT_STYLE_ITALIC => _('Italic'),
				])
			)
			->addField(
				new CWidgetFieldColor('background_color', _('Background color'))
			)
			->addField(
				(new CWidgetFieldRadioButtonList('horizontal_align', _('Horizontal align'), [
					Widget::HORIZONTAL_ALIGN_NONE => _('None'),
					Widget::HORIZONTAL_ALIGN_LEFT => _('Left'),
					Widget::HORIZONTAL_ALIGN_CENTER => _('Center'),
					Widget::HORIZONTAL_ALIGN_RIGHT => _('Right'),
				]))->setDefault(Widget::HORIZONTAL_ALIGN_CENTER)
			)
		;
	}

	function createFontSelect(string $name): CWidgetFieldSelect
	{
		return (new CWidgetFieldSelect($name, _('Font family'), [
			0 => 'Georgia',
			1 => 'Palatino',
			2 => 'Times New Roman',
			3 => 'Arial',
			4 => 'Arial Black',
			5 => 'Comic Sans',
			6 => 'Impact',
			7 => 'Lucida Sans',
			8 => 'Tahoma',
			9 => 'Helvetica',
			10 => 'Verdana',
			11 => 'Courier New',
			12 => 'Lucida Console',
			13 => 'Rubik',
		]));
	}
}
