# Shortcode for Keyboard and Controller Buttons

A simple shortcode plugin to insert keyboard keys
and controller buttons into the article.

## Installation

1. Get zip file from the [release page](https://github.com/dousha/wp-kbdctl/releases)
2. Upload the zip file to your WordPress plugin page
3. Enable the plugin

## How to Use

This plugin provides two shortcodes: `[kbd]` and `[btn]`
for representing keyboard keys and controller buttons.

All names used for keys and controllers are in lowercase 
unless stated otherwise.

### Keyboard

Keyboard keys are represented by `[kbd]key[/kbd]`.
Some special keys that has a symbol are listed below.

#### Names for Special Keys

* `left` - Left Arrow
* `right` - Right Arrow
* `up` - Up Arrow
* `down` - Down Arrow
* `enter` - Enter
* `tab` - Tab
* `shift` - Shift
* `ctrl` - Control, as on IBM compatibles
* `cmd` - Command, as on Apple keyboards
* `helm` - Control, as on Apple keyboards
* `ctrls` - Control/Command
* `alt` - Alt
* `option` - Option, as on Apple keyboards
* `alts` - Alt/Option
* `win` - Windows key
* `meta` - Windows key
* `backspace` - Backspace
* `pgdn` - Page Down
* `pgup` - Page Up
* `home` - Home
* `end` - End
* `del` - Dekte
* `ins` - Insert
* `sysrq` - Print Screen / System Request
* `pause` - Pause / Break
* `menu` - Menu, as on IBM compatibles, near right ctrl
* `compose` - Compose
* `esc` - Escape
* `caps` - Caps lock
* `num` - Num lock
* `scroll` - Scroll lock

### Controllers

Xbox Series X, PlayStation 5 and Switch controller 
buttons are supported. You can specify which to use 
with `v` parameter:

```
XBox A button is [btn v="xbox"]a[/btn];
Switch B button is [btn v="switch"]b[/btn];
and PlayStation Triangle button is [btn v="ps"]triangle[/btn]
```

#### Names for XBox Controllers

Following names are recognized for XBox controllers:

* `a` => A
* `b` => B
* `x` => X
* `y` => Y
* `view` => View
* `share` => Share
* `menu` => Menu
* `du` => DPad Up
* `dd` => DPad Down
* `dl` => DPad Left
* `dr` => DPad Right
* `ls` => Left Stick
* `lsp` => Left Stick Press
* `rs` => Right Stick
* `rsp` => Right Stick Press
* `lb` => Left Bumper
* `lt` => Left Trigger
* `rb` => Right Bumper
* `rt` => Right Trigger

#### Names for PlayStation Controllers

Following names are recognized for PlayStation controllers:

* `circle` => Circle
* `cross` => Cross
* `square` => Square
* `triangle` => Triangle
* `view` => View
* `share` => Share Alt
* `options` => Options Alt
* `du` => DPad Up
* `dd` => DPad Down
* `dl` => DPad Left
* `dr` => DPad Right
* `ls` => Left Stick
* `l3` => Left Stick Press
* `lsp` => Left Stick Press
* `rs` => Right Stick
* `r3` => Right Stick Press
* `rsp` => Right Stick Press
* `l1` => L1
* `l2` => L2
* `r1` => R1
* `r2` => R2

#### Names for Switch Controllers

* `a` => A
* `b` => B
* `x` => X
* `y` => Y
* `plus` => Plus
* `minus` => Minus
* `home` => Home
* `record` => Square
* `du` => DPad Up
* `dd` => DPad Down
* `dl` => DPad Left
* `dr` => DPad Right
* `ls` => Left Stick
* `lsp` => Left Stick
* `rs` => Right Stick
* `rsp` => Right Stick
* `l` => Left Bumper (L)
* `zl` => Left Trigger (ZL)
* `r` => Right Bumper (R)
* `zr` => Right Trigger (ZR)

#### Equivalence Buttons

## Credits

Huge thanks to Nicolae Berbece for releasing [Xelu's Controllers & Keyboard Prompts](https://thoseawesomeguys.com/prompts/) under CC0 license.

## License

Icon images made by Nicolae remain under Creative Commons 0 (CC0).

All other code is MIT licensed.
