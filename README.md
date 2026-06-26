<div align="center">
    <h1>
        headerMAX
    </h1>
    <h4><i>
        Custom text / HTML panel for Zabbix dashboards - headlines, section headers, notes and linked buttons with full font, color and alignment control. Free edition covers plain-text headers; PRO edition adds HTML content, live expression-macro resolution, vertical alignment, padding and transparent background.
    </i></h4>
    <br>
    <img alt="Static Badge" src="https://img.shields.io/badge/Required%20Zabbix%20version-6.0%2B-red">
    <img alt="Static Badge" src="https://img.shields.io/badge/Required%20php%20version-7.4--8.3-blue">
    <h3>
        <a href="#description">Description</a> -
        <a href="#key-features">Key features</a> -
        <a href="#editions">Editions</a> -
        <a href="#configuration">Configuration</a> -
        <a href="#installation">Installation</a>
    </h3>
    <br>
    <img src="https://repo.initmax.com/zabbix/_meta/header/screen/01-overview.png" width="1000" alt="headerMAX widgets on a Zabbix dashboard">
</div>
<br>
<br>

## Description

**headerMAX** is the dashboard text panel that does one thing well: put a readable, styled headline or note exactly where your dashboard needs it. Pick a font, size, color and alignment and the panel renders instantly - section headers above widget groups, on-call notes, linked buttons, status banners.

<!-- *********************************************************************************************************************************** -->
<br>

## Key features

The free edition delivers the core text panel: multi-line content, 14 font families (including bundled Rubik), font size, color and style (bold/italic/underline), background color and horizontal alignment.

The PRO edition adds HTML tags in content (links, images, markup), live resolution of Zabbix expression macros (e.g. `{?last(/Host/key)}`) so the panel shows live values, vertical alignment, configurable padding, and the option to remove the widget background and border entirely - the text floats directly on the dashboard. One-click Examples presets (KPI tiles, single stat, gauge bar, throughput) load ready-made content layouts.

<!-- *********************************************************************************************************************************** -->
<br>

## Editions

<div align="center">

| Function                                            | FREE   | PRO        |
|-----------------------------------------------------|:------:|:----------:|
| Multi-line text content                             | OK     | OK         |
| 14 font families incl. bundled Rubik                | OK     | OK         |
| Font size, color, bold / italic / underline         | OK     | OK         |
| Background color                                    | OK     | OK         |
| Horizontal alignment                                | OK     | OK         |
| One-click Examples presets (KPI / stat / gauge ...) | OK     | OK         |
| HTML tags in content (links, images, markup)        | -      | OK         |
| Resolve expression macros to live values            | -      | OK         |
| Vertical alignment                                  | -      | OK         |
| Configurable padding                                | -      | OK         |
| Remove widget background and border                 | -      | OK         |

<h3>
    Get PRO version: <a href="https://www.initmax.com/product/headermax/">Product page</a>
</h3>
</div>

<!-- *********************************************************************************************************************************** -->
<br>

## Configuration

<div align="center">
    <img src="https://repo.initmax.com/zabbix/_meta/header/screen/06-settings.png" width="500" alt="headerMAX widget configuration popup">
</div>
<br>
<div align="center">

| Field                            | Description                                                                              |   |
|----------------------------------|------------------------------------------------------------------------------------------|---|
| **Content**                      | The text to display. New lines are preserved.                                           |   |
| **Font family**                  | One of 14 fonts, including the bundled Rubik.                                           |   |
| **Font size / color / style**    | Pixel size, color picker, bold / italic / underline toggles.                            |   |
| **Background color**             | Panel background; empty = transparent.                                                  |   |
| **Horizontal align**             | None / Left / Center / Right.                                                           |   |
| **Allow HTML tags in content**   | Render the content as HTML - links, images, any markup.                                 | * |
| **Vertical align**               | None / Top / Middle / Bottom.                                                           | * |
| **Padding**                      | Inner spacing in pixels (0-100).                                                        | * |
| **Remove background and border** | Text floats directly on the dashboard - no widget chrome.                               | * |

</div>

> `*` Settings available only in PRO version
>
> In the free edition these PRO fields stay visible but greyed out, each with a padlock and a hover hint explaining the feature plus an in-place upgrade link - so you see exactly what PRO unlocks, right where you would use it.

<!-- *********************************************************************************************************************************** -->
<br>

## Installation

> PRO repo access tokens are issued via <https://portal.initmax.com> after purchase. The free repo is public.

### Debian / Ubuntu / Raspberry Pi OS

```bash
curl -fsSL https://repo.initmax.com/zabbix/release/initmax-release-latest_all.deb -o /tmp/initmax-release.deb
sudo apt install -y /tmp/initmax-release.deb
sudo apt update
sudo apt install zabbix-module-header
```

To enable PRO add a second sources entry with your portal token (one token unlocks every product you have a license for):

```bash
sudo tee /etc/apt/sources.list.d/initmax-pro.sources <<'EOF'
Types: deb
URIs: https://USER:imxk_xxxxxxxx@repo.initmax.com/zabbix/pro/deb
Suites: default
Components: all
Signed-By: /etc/apt/keyrings/initmax.asc
EOF
sudo apt update
sudo apt install zabbix-module-header
```

### RHEL / Rocky / Alma / Oracle / Amazon Linux

```bash
sudo dnf install -y https://repo.initmax.com/zabbix/release/initmax-release-latest.noarch.rpm
sudo dnf install -y zabbix-module-header
```

After install, the module lives at `/usr/share/zabbix/modules/header/`. Enable it in the Zabbix UI under **Administration -> General -> Modules**.

<!-- *********************************************************************************************************************************** -->
<br>

## Supported Zabbix versions

Tested on Zabbix 6.0 LTS / 6.2 / 6.4 / 7.0 LTS / 7.2 / 7.4 - ONE package covers the whole range (v2 module for 6.4+, legacy v1 module for 6.0/6.2; Zabbix loads whichever its manifest version accepts). The code base is PHP 7.4-8.3 compatible. The authoritative per-release range is the `supported_versions` field in the shipped `manifest.json`.

## Development

This widget uses the initMAX v3 pipeline; the canonical CI lib is in [`initMAX-Private/gitlab-ci-main`](https://git.initmax.cz/initMAX-Private/gitlab-ci-main).

```bash
# Build free edition locally
python3 /path/to/gitlab-ci-main/tools/build-edition.py . /tmp/build-free free
# Build pro edition (includes PRO-only features)
python3 /path/to/gitlab-ci-main/tools/build-edition.py . /tmp/build-pro pro
# Local Zabbix dev container with widget bind-mounted
cd docker && docker compose --profile zabbix-7.4 up   # or --profile zabbix-7.0 / zabbix-7.2
```

The local harness covers the 7.0 / 7.2 / 7.4 frontends only. The 6.2 / 6.4 range
(legacy v1 module) is exercised in CI via the coverage matrix, not locally.

```bash
php tests/smoke.php
npx playwright test tests/e2e.spec.ts   # requires a running frontend, e.g. --profile zabbix-7.4
```

<!-- *********************************************************************************************************************************** -->
<br>

## License

Free edition: [AGPLv3](https://www.gnu.org/licenses/agpl-3.0.html) - PRO edition: Apache 2.0 (commercial).
Copyright (C) 2001-2026 initMAX s.r.o.

<div align="center">
    <a href="https://www.initmax.com/wiki/headermax/">
        Wiki
    </a>
    -
    <a href="https://repo.initmax.com/zabbix/free/">
        repo.initmax.com
    </a>
    -
    <a href="https://portal.initmax.com">
        portal.initmax.com
    </a>
    -
    <a href="https://www.initmax.com/">
        initmax.com
    </a>
</div>
