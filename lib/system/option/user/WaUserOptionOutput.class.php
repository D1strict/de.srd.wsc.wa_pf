<?php
/**
 @author		D1strict-Development
 Internal Information: de.srd.wsc.wa_pf
 @copyright 	2020 Felix Waßmuth
*/

namespace wcf\system\option\user;
use wcf\data\user\option\UserOption;
use wcf\data\user\User;
use wcf\util\StringUtil;
class WaUserOptionOutput implements IUserOptionOutput {

/**
 * @see wcf\system\option\user\IUserOptionOutput::getOutput()
 */
public function getOutput(User $user, UserOption $option, $value) {
		if (empty($value)) return '';
		$rmv = array(' ', '+');
		$value = StringUtil::trim($value);
		$link = 'https://api.whatsapp.com/send?phone=' . $value;

		$link = StringUtil::encodeHTML($link);
		$link = str_replace($rmv, "", $link);
		$value = StringUtil::encodeHTML($value);

		return '<a href="'.$link.'" class="externalURL"'.(EXTERNAL_LINK_REL_NOFOLLOW ? ' rel="nofollow"' : '').(EXTERNAL_LINK_TARGET_BLANK ? ' target="_blank"' : '').'>'.$value.'</a>';
	}
}
