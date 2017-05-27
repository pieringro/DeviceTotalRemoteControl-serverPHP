<?php
	class QQN {
		/**
		 * @return QQNodeDtrcDevices
		 */
		static public function DtrcDevices() {
			return new QQNodeDtrcDevices('dtrc_devices', null, null);
		}
		/**
		 * @return QQNodeDtrcFiles
		 */
		static public function DtrcFiles() {
			return new QQNodeDtrcFiles('dtrc_files', null, null);
		}
		/**
		 * @return QQNodeDtrcUsers
		 */
		static public function DtrcUsers() {
			return new QQNodeDtrcUsers('dtrc_users', null, null);
		}
	}
?>