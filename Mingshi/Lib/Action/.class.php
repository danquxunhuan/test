<?php

/**
 * 图片上传控制器
 * @author    Jiekii <jiekii@vip.qq.com>
 * @website    http://jiekii.com
 * @date        2014-02-21
**/

namespace Home\Controller;

class UploadController extends HomeController {
    public function photo() {
        if(IS_POST) {
            //设置文件保存目录
            $baseDir = './data/';
            $attachDir = './attachment/photo/'.date('Ym').'/';
            $subDir = date('d');
            $saveName = date('His').strtolower(random(16));

            //上传类配置信息
            $config = array(
                'maxSize' => 2097152,
                'exts' => array('jpg', 'jpeg', 'png', 'gif'),
                'rootPath' => $baseDir,
                'savePath' => $attachDir,
                'subName' => array('date', 'd'),
                'saveName' => $saveName,
                'hash' => false
            );

            //初始化上传类
            $upload = new \Think\Upload($config);

            //检查是否选择图片
            $inputName = 'photo';
            $total = 0;
            $data = array();
            foreach($_FILES[$inputName] as $key => $value) {
                foreach($value as $k => $v) {
                    $data[$k][$key] = $v;
                    if($key == 'name' && $v){
                        $total++;
                    }
                }
            }
            if(!$total) {
                $this->error('请先选择要上传的图片！');
            }

            $uploadSuccess = $uploadFailure = 0;
            $result = array();

            //缩略图列表，数组为空则不生成缩略图
            //键为缩略图文件名后缀，例如：20140221abc_a.jpg
            //值为缩略图宽/高
            $thumbList = array(
                'a' => array(150, 150),
                'c' => array(250, 250),
                'm' => array(500, 500)
            );

            //初始化缩略图类
            if(!empty($thumbList)) {
                $image = new \Think\Image();
            }

            foreach($data as $key => $value) {
                if(!$value['name']) continue;

                //如果多图则从第二张开始设置新的文件名
                if($key >= 1) {
                    $upload->saveName = date('His').strtolower(random(16));
                }

                //开始上传
                $file = $upload->upload(array($inputName => $value));

                //上传成功
                if(!empty($file)) {
                    $uploadSuccess++;

                    //缩略图
                    if(!empty($thumbList)) {
                        $path = $baseDir.$file[$inputName]['savepath'].$upload->saveName;
                        $fileExt = $file[$inputName]['ext'];
                        $filePath = $path.'.'.$fileExt;

                        //生成缩略图，按照原图的比例
                        foreach($thumbList as $thumbName => $thumbSize) {
                            if(!$thumbName || empty($thumbSize)) continue;

                            $image->open($filePath);
                            $image->thumb($thumbSize[0], $thumbSize[1])->save($path.'_'.$thumbName.'.'.$fileExt);
                        }
                    }
                } else {
                    $uploadFailure++;
                }
                $result[] = array($upload->getError(), $file);
            }

            //成功提示
            if($uploadSuccess) {
                $this->error($uploadSuccess.'张图片上传成功！');
            } else {
                $this->error('上传失败！');
            }
        } else {
            $value = array(
                'meta_title' => '上传照片'
            );
            $this->assign($value)->display();
        }
    }
}