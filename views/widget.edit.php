<?php declare(strict_types = 0);

use Modules\Header\Includes\CDivHtml;

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


/**
 * headerMAX widget form view.
 *
 * @var CView $this
 * @var array $data
 */

(new CWidgetFormView($data))
    ->addField(
        (new CWidgetFieldTextAreaView($data['fields']['content']))
            ->setWidth(ZBX_TEXTAREA_STANDARD_WIDTH)
    )
    ->addField(
        new CWidgetFieldSelectView($data['fields']['font_family'])
    )
    ->addField(
        new CWidgetFieldColorView($data['fields']['font_color']),
        'js-row-bg-color'
    )
    ->addField(
        new CWidgetFieldIntegerBoxView($data['fields']['font_size'])
    )
    ->addField(
		new CWidgetFieldCheckBoxListView($data['fields']['font_style'])
    )
    ->addField(
        new CWidgetFieldColorView($data['fields']['background_color']),
    )
    ->addField(
        new CWidgetFieldRadioButtonListView($data['fields']['horizontal_align'])
    )
    ->addItem([
        new CLabel(''),
        (new CDivHtml())
            ->addStyle('margin-top: 1rem;')
            ->addRawHtml('<b>Get PRO version with more features and support <a href="https://www.initmax.com/product/headermax/" target="_blank">here</a>!</b>')
    ])
	->includeJsFile('widget.edit.js.php')
    ->addJavaScript('widget_header_form.init();')
	->show();
