<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Netmask {
	
	function isi_netmask($_netmask_)
	{
		switch ($_netmask_){
		case '255.255.255.252':
			return '4';
			break;
		case '255.255.255.248':
			return '8';
			break;
		case '255.255.255.240':
			return '16';
			break;
		case '255.255.255.224':
			return '32';
			break;
		case '255.255.255.192':
			return '64';
			break;
		case '255.255.255.128':
			return '128';
			break;
		case '255.255.255.0':
			return '256';
			break;
		case '255.255.254.0':
			return '512';
			break;
		case '255.255.252.0':
			return '1024';
			break;
		case '255.255.248.0':
			return '2048';
			break;
		case '255.255.240.0':
			return '4096';
			break;
		case '255.255.224.0':
			return '8192';
			break;
		case '255.255.192.0':
			return '16384';
			break;
		case '255.255.128.0':
			return '32768';
			break;
		case '255.255.0.0':
			return '65536';
			break;
		case '255.254.0.0':
			return '131072';
			break;
		case '255.252.0.0':
			return '262144';
			break;
		case '255.248.0.0':
			return '524288';
			break;
		case '255.240.0.0':
			return '1048576';
			break;
		case '255.224.0.0':
			return '2097152';
			break;
		case '255.192.0.0':
			return '4192304';
			break;
		case '255.128.0.0':
			return '8388608';
			break;
		case '255.0.0.0':
			return '16777216';
			break;
		default:
			return 'Error';
		break;
		}
	} // END isi_netmask //
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Netmask.php */