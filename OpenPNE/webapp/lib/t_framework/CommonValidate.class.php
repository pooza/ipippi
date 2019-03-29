<?php
/**
 * commonValidate
 *
 * ����ini�ե�������ɤ߹��ߤ��ά�����뤿��Υ��֥��饹
 */
class CommonValidate extends Validator
{

/**
 * common_validate
 *
 * - ���̤�ini�ե�����(validate/common/*.ini)���ɤ߹���,
 * - $result�μ���,
 * - $request�μ���,
 *  ��ޤȤ�ƹԤ���
 *
 * @access public
 * @param array *.ini file names. full path. array('/hogehoge/example.ini',,,)
 * @return array(boolean,array(name=>value, name=>value,,,))
 */
	function common_validate($ini_files = array())
	{
		// ������������̤�ini�ե�����
		$v_dir = DOCUMENT_ROOT . "/webapp/validate/";
		$common_ini_files = array();
		$common_ini_files[] = $v_dir . "msg.ini"; // ���顼��å�������
		$common_ini_files[] = $v_dir . "sessid.ini"; // �Ϥޤ�������к����å����ID
		foreach ($common_ini_files as $ini) {
			$this->addIniSetting($ini);
		}

		// Ǥ�դ�ini�ե�����
		foreach ($ini_files as $ini) {
			$this->addIniSetting($ini);
		}

		// �ͥ����å��¹�
		$result = $this->validate();
		$requests = $this->getParams();
		
		return array($result, $requests);
	}
}
?>
