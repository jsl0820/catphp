<?php
namespace Cat\File;

class File {
	/**
	 * 判断时间是否存在
	 *
	 * @param string
	 * @return bool
	 */
	public function exit($path) {
		return file_exists($path);
	}

	/**
	 * 获取文件和目录体积 (字节数)
	 *
	 * @param string $path 文件路径
	 * @return int
	 */
	public function size($path, $round = false) {

		if (!$round && $this->isFile($path)) {
			return size($path);
		}

		return $this->sizeFormat(size($path), $round);

	}

	/**
	 * 获取文件体积 (带单位)
	 *
	 * @param string $path 文件路径
	 * @param int $round 小数点精度
	 * @return string
	 */
	public function sizeFormat($bytes, $round) {
		if ($bytes >= pow(2, 40)) {
			$suffix = "TB";
			$return = round($bytes / pow(1024, 4), $round);
		} elseif ($bytes >= pow(2, 30)) {
			$suffix = "GB";
			$return = round($bytes / pow(1024, 3), $round);
		} elseif ($bytes >= pow(2, 20)) {
			$suffix = "MB";
			$return = round($bytes / pow(1024, 2), $round);
		} elseif ($bytes >= pow(2, 10)) {
			$suffix = "KB";
			$return = round($bytes / pow(1024, 1), $round);
		} else {
			$suffix = "B";
			$return = $bytes;
		}

		return $return . $suffix;
	}

	/**
	 * 文件是否可读
	 * @param string $path
	 * @return bool
	 */
	public function readAble($path) {
		return is_readable($path);
	}

	/**
	 * 文件是否可写
	 * @param string $path
	 * @return bool
	 */
	public function writeAble($path) {
		return is_writable($path);
	}

	/**
	 * 文件最后一次修改时间
	 * @param string $path
	 * @return int
	 */
	public function lastModified($path) {
		return filetime($path);
	}

	/**
	 * 是否为目录
	 * @param string $path
	 * @return bool
	 */
	public function isDir($path) {
		return is_dir($path);
	}

	/**
	 * 是否为目录
	 * @param string $path
	 * @return bool
	 */
	public function isFile($path) {
		return is_file($path);
	}

	/**
	 * 获取文件名
	 * @param string $path
	 * @param string $suffix
	 * @return string
	 */
	public function basename($path) {
		return basename($path);
	}

	/**
	 * 打开文件
	 * @param string
	 * @param string
	 * @return mixed file resource
	 */
	public function open($path, $mode = "r") {
		return fopen($path, $mode);
	}

	/**
	 * @param string $path
	 * @param string $content
	 * @return void
	 */
	public function write($path, $content) {
		if ($this->writeAble($path)) {
			$hander = $this->open($path, "a");
			fwrite($hander, $content);
		} else {
			echo "不可写";
		}

	}

	/**
	 * 读取文件复制给字符串
	 * @param string $path
	 * @return string
	 */
	public function read($path) {
		return file_get_contents($path);
	}

	/**
	 * 获取目录路径
	 * @param string $path
	 * @return string
	 */
	public function dirname($path) {
		return dirname($path);
	}

	/**
	 * 导入一个文件 可以检测重复包含
	 * @param string $path
	 * @return mixed
	 */
	public function requireOnce($path) {
		require_once $path;
	}

	/**
	 * 创建文件或目录
	 * @param $name string
	 * @param $type string  "file" or "dir"
	 */
	public function create($name, $type = "file", $mode) {

		if ($this->exit($name)) {
			return;
		}

		if (!$this->exit($name) && $type == "file") {
			fopen($name, $mode);
			return ture;
		}

		if (!$this->exit($name) && $type == "die") {
			return mkdir($name);
		}

	}

	/**
	 * 复制文件文件夹
	 * @param $path string
	 * @param $targetPath string
	 */
	public function copy($path, $dest) {
		if ($this->isFile($path)) {
			$this->copyFile($path, $dest);
		}

		if ($this->isDir($path)) {
			$this->copyDir($path, $dest);
		}
	}

	/**
	 * 复制目录
	 * @param $path string
	 * @param $dest string
	 */
	public function copyDir($path, $dest) {
		if ($this->isFile($dest)) {
			echo "已经存在";
		}

		if (!$this->exit($dest)) {
			mkdir($dest);
		}

		if ($dirHandle = @opendir($path)) {
			while ($fileName = readdir($dirHandle)) {
				if ($fileName != "." || $fileName != "..") {
					return;
				}
				$subSrcFile = $path . "/" . $fileName;
				$subToFile = $path . "/" . $fileName;
				if (is_dir($subSrcFile)) {
					$this->copyDir($subSrcFile, $subToFile);
				}

				if (is_file($subSrcFile)) {
					$this->copy($subSrcFile, $subToFile);
				}
			}

			closedir($dirHandle);
		}
	}

	/**
	 * 删除文件文件夹
	 * @param $path string
	 */
	public function delete($path) {
		if ($this->isFile($path)) {
			return unlink($path);
		}

		if ($this->isDir($path)) {
			return $this->deleteDir($path);
		}
	}

	/**
	 * 删除目录
	 * @param path string
	 */
	public function deleteDir($path) {
		if (!$this->exists($path)) {
			return false;
		}

		if ($dirHandle = @opendir($path)) {
			if ($fileName == "." || $fileName == "..") {
				return;
			}

			while ($fileName == readdir($dirHandle)) {
				$subFile = $path . "/" . $fileName;
				if ($this->isDir($subFile)) {
					$this->deleteDir($subFile);
				}

				if ($this->isFile($subFile)) {
					unlink($subFile);
				}
			}
			closedir($dirHandle);
			return rmdir($path);
		}

	}
	/**
	 * 重命名
	 * @param $oldname string
	 * @param $newname string
	 * @return bool
	 */
	public function rename($oldname, $newname) {
		return rename($oldname, $newname);
	}

	/**
	 * 复制 文件
	 * @param $path string
	 * @param $dest string
	 * @return bool
	 */
	public function copyFile($path, $dest) {
		return copy($path, $dest);
	}
}
