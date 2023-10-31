<?php

/**
 * @wordpress-plugin
 * Plugin Name: Keyboard and Controller Code
 * Plugin URI: https://github.com/dousha/wp-kbdctl
 * Description: Shortcode plugin to insert proper keyboard and controller buttons into your articles.
 * Version: 1.0.0
 * Author: dousha
 * Author URI: https://dsstudio.tech/
 * License: MIT
 * 
 * Special thanks to Xelu, who made the controller icons and shared with everyone!
 */

if (!defined("ABSPATH")) {
    exit;
}

const d_kbd_ctrl_xbox_prefix = 'Xbox/XboxSeriesX_';
const d_kbd_ctrl_xbox_suffix = '.png';
const d_kbd_ctrl_ps_prefix = 'Playstation/PS5_';
const d_kbd_ctrl_ps_suffix = '.png';
const d_kbd_ctrl_switch_prefix = 'Switch/Switch_';
const d_kbd_ctrl_switch_suffix = '.png';

const d_kbd_ctrl_xbox_buttons = array(
    'a' => 'A',
    'b' => 'B',
    'x' => 'X',
    'y' => 'Y',
    'view' => 'View',
    'share' => 'Share',
    'menu' => 'Menu',
    'du' => 'Dpad_Up',
    'dd' => 'Dpad_Down',
    'dl' => 'Dpad_Left',
    'dr' => 'Dpad_Right',
    'ls' => 'Left_Stick',
    'lsp' => 'Left_Stick_Click',
    'rs' => 'Right_Stick',
    'rsp' => 'Right_Stick_Click',
    'lb' => 'LB',
    'lt' => 'LT',
    'rb' => 'RB',
    'rt' => 'RT',

    // equivalences
    'EquivalenceUp' => 'Dpad_Up',
    'EquivalenceDown' => 'Dpad_Down',
    'EquivalenceLeft' => 'Dpad_Left',
    'EquivalenceRight' => 'Dpad_Right',
    'EquivalenceSelect' => 'View',
    'EquivalenceStart' => 'Menu',
    'EquivalenceActionRight' => 'B',
    'EquivalenceActionLeft' => 'X',
    'EquivalenceActionUp' => 'Y',
    'EquivalenceActionTop' => 'Y',
    'EquivalenceActionDown' => 'A',
    'EquivalenceActionBottom' => 'B',
    'EquivalenceLeftBumper' => 'LB',
    'EquivalenceRightBumper' => 'RB',
    'EquivalenceLeftTrigger' => 'LT',
    'EquivalenceRightTrigger' => 'RT',
    'EquivalenceLeftStick' => 'Left_Stick',
    'EquivalenceRightStick' => 'Right_Stick',
    'EquivalenceLeftStickPress' => 'Left_Stick_Click',
    'EquivalenceRightStickPress' => 'Right_Stick_Click',
);

const d_kbd_ctrl_ps_buttons = array(
    'circle' => 'Circle',
    'cross' => 'Cross',
    'square' => 'Square',
    'triangle' => 'Triangle',
    'view' => 'View',
    'share' => 'Share_Alt',
    'options' => 'Options_Alt',
    'du' => 'Dpad_Up',
    'dd' => 'Dpad_Down',
    'dl' => 'Dpad_Left',
    'dr' => 'Dpad_Right',
    'ls' => 'Left_Stick',
    'l3' => 'Left_Stick_Click',
    'lsp' => 'Left_Stick_Click',
    'rs' => 'Right_Stick',
    'r3' => 'Right_Stick_Click',
    'rsp' => 'Right_Stick_Click',
    'l1' => 'L1',
    'l2' => 'L2',
    'r1' => 'R1',
    'r2' => 'R2',

    // equivalences
    'EquivalenceUp' => 'Dpad_Up',
    'EquivalenceDown' => 'Dpad_Down',
    'EquivalenceLeft' => 'Dpad_Left',
    'EquivalenceRight' => 'Dpad_Right',
    'EquivalenceSelect' => 'Touch_Pad',
    'EquivalenceStart' => 'Options_Alt',
    'EquivalenceActionRight' => 'Circle',
    'EquivalenceActionLeft' => 'Square',
    'EquivalenceActionUp' => 'Triangle',
    'EquivalenceActionTop' => 'Triangle',
    'EquivalenceActionDown' => 'Cross',
    'EquivalenceActionBottom' => 'Cross',
    'EquivalenceLeftBumper' => 'L1',
    'EquivalenceRightBumper' => 'R1',
    'EquivalenceLeftTrigger' => 'L2',
    'EquivalenceRightTrigger' => 'R2',
    'EquivalenceLeftStick' => 'Left_Stick',
    'EquivalenceRightStick' => 'Right_Stick',
    'EquivalenceLeftStickPress' => 'Left_Stick_Click',
    'EquivalenceRightStickPress' => 'Right_Stick_Click',
);

const d_kbd_ctrl_switch_buttons = array(
    'a' => 'A',
    'b' => 'B',
    'x' => 'X',
    'y' => 'Y',
    'plus' => 'Plus',
    'minus' => 'Minus',
    'home' => 'Home',
    'record' => 'Square',
    'du' => 'Dpad_Up',
    'dd' => 'Dpad_Down',
    'dl' => 'Dpad_Left',
    'dr' => 'Dpad_Right',
    'ls' => 'Left_Stick',
    'lsp' => 'Left_Stick',
    'rs' => 'Right_Stick',
    'rsp' => 'Right_Stick',
    'lb' => 'LB',
    'lt' => 'LT',
    'rb' => 'RB',
    'rt' => 'RT',

    // equivalences
    'EquivalenceUp' => 'Dpad_Up',
    'EquivalenceDown' => 'Dpad_Down',
    'EquivalenceLeft' => 'Dpad_Left',
    'EquivalenceRight' => 'Dpad_Right',
    'EquivalenceSelect' => 'Minus',
    'EquivalenceStart' => 'Plus',
    'EquivalenceActionRight' => 'Right',
    'EquivalenceActionLeft' => 'Left',
    'EquivalenceActionUp' => 'Up',
    'EquivalenceActionTop' => 'Up',
    'EquivalenceActionDown' => 'Down',
    'EquivalenceActionBottom' => 'Down',
    'EquivalenceLeftBumper' => 'LB',
    'EquivalenceRightBumper' => 'RB',
    'EquivalenceLeftTrigger' => 'LT',
    'EquivalenceRightTrigger' => 'RT',
    'EquivalenceLeftStick' => 'Left_Stick',
    'EquivalenceRightStick' => 'Right_Stick',
    'EquivalenceLeftStickPress' => 'Left_Stick',
    'EquivalenceRightStickPress' => 'Right_Stick',
);

const d_kbd_ctrl_key_symbols = array(
    'left' => '←',
    'right' => '→',
    'up' => '↑',
    'down' => '↓',
    'enter' => '⮠ Enter',
    'tab' => '⭾ Tab',
    'shift' => '⇧ Shift',
    'ctrl' => 'Ctrl',
    'cmd' => '⌘ Command',
    'alt' => 'Alt',
    'option' => '⌥',
    'ctrls' => 'Ctrl / ⌘',
    'alts' => 'Alt / ⌥',
    'helm' => '^ Ctrl',
    'meta' => '❖ Win',
    'backspace' => '⌫ Backspace',
    'pgdn' => '⎘ Page Down',
    'pgup' => '⎗ Page Up',
    'home' => '⌂ Home',
    'menu' => '▤ Menu',
    'compose' => '⎄ Compose',
    'esc' => '⎋ Escape',
    'del' => '⌦ Delete',
    'ins' => '⎀ Insert',
    'sysrq' => '⎙ PrtSc/SysRq',
    'pause' => '⎉ Pause/Break',
    'caps' => '🄰 Caps Lock',
    'num' => '⇭ Num Lock',
    'scroll' => '⇳ Scroll Lock'
);

function d_kbd_ctrl_assemble_url($asset_name)
{
    return plugin_dir_url(__FILE__) . 'assets/image/' . $asset_name;
}

function d_kbd_ctrl_query_name($variant, $name)
{
    switch ($variant) {
        case 'xbox':
            $asset = d_kbd_ctrl_xbox_buttons[$name];
            if (is_null($asset)) {
                return null;
            }

            return d_kbd_ctrl_xbox_prefix . $asset . d_kbd_ctrl_xbox_suffix;
        case 'ps':
        case 'playstation':
            $asset = d_kbd_ctrl_ps_buttons[$name];
            if (is_null($asset)) {
                return null;
            }

            return d_kbd_ctrl_ps_prefix . $asset . d_kbd_ctrl_ps_suffix;
        case 'switch':
            $asset = d_kbd_ctrl_switch_buttons[$name];
            if (is_null($asset)) {
                return null;
            }

            return d_kbd_ctrl_switch_prefix . $asset . d_kbd_ctrl_ps_suffix;
        default:
            return null;
    }
}

function d_kbd_ctrl_add_shortcodes()
{
    add_shortcode('kbd', 'd_kbd_ctrl_render_keyboard_emblem');
    add_shortcode('key', 'd_kbd_ctrl_render_keyboard_emblem');
    add_shortcode('btn', 'd_kbd_ctrl_render_controller_emblem');
    add_shortcode('ctl', 'd_kbd_ctrl_render_controller_emblem');
}

function d_kbd_ctrl_add_styles()
{
    wp_enqueue_style('d-kbd-ctrl-style', plugins_url('/assets/css/style.css', __FILE__), [], '0.0.3');
}

function d_kbd_ctrl_render_keyboard_emblem($attr = array(), $content = null, $tag = '')
{
    if (is_null($content)) {
        return '<kbd title="Space" class="d-kbd-ctrl-key">&nbsp;</kbd>';
    }

    $key = d_kbd_ctrl_key_symbols[$content];
    if (is_null($key)) {
        return "<kbd title=\"$content\" class=\"d-kbd-ctrl-key\">$content</kbd>";
    } else {
        return "<kbd title=\"$content\" class=\"d-kbd-ctrl-key\">$key</kbd>";
    }
}

function d_kbd_ctrl_render_controller_emblem($attr = array(), $content = null, $tag = '')
{
    if (is_null($content)) {
        return "";
    }

    if (str_starts_with($content, 'Equivalence')) {
        // equivalence mode
        // in equivalence mode, all items are listed
        $xbox = d_kbd_ctrl_query_name('xbox', $content);
        $ps = d_kbd_ctrl_query_name('ps', $content);
        $switch = d_kbd_ctrl_query_name('switch', $content);

        $out = '<span class="d-kbd-ctrl-controller-emblems">';

        if (!is_null($xbox)) {
            $out = $out . '<img class="d-kbd-ctrl-emblem" alt="' . $content . '" src="' . d_kbd_ctrl_assemble_url($xbox) . '"><span>/</span>';
        }

        if (!is_null($ps)) {
            $out = $out . '<img class="d-kbd-ctrl-emblem" alt="' . $content . '" src="' . d_kbd_ctrl_assemble_url($ps) . '"><span>/</span>';
        }

        if (!is_null($switch)) {
            $out = $out . '<img class="d-kbd-ctrl-emblem" alt="' . $content . '" src="' . d_kbd_ctrl_assemble_url($switch) . '">';
        }

        $out = $out . '</span>';
        return $out;
    } else {
        $variant = $attr['v'];
        if (is_null($variant)) {
            $variant = $attr['var'];
        }

        if (is_null($variant)) {
            $variant = $attr['variant'];
        }

        if (is_null($variant)) {
            $variant = 'xbox';
        }

        // single mode
        $assetName = d_kbd_ctrl_query_name($variant, $content);
        if (is_null($assetName)) {
            return '?=' . $content;
        }

        return '<span class="d-kbd-ctrl-controller-emblems"><img class="d-kbd-ctrl-emblem" alt="' . $content . '" src="' . d_kbd_ctrl_assemble_url($assetName) . '"></span>';
    }
}

add_action('init', 'd_kbd_ctrl_add_shortcodes');
add_action('init', 'd_kbd_ctrl_add_styles');
