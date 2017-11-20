<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Network\Exception\internalErrorException;

/**
 * Upload component
 */
class UploadComponent extends Component
{

    public $max_files= 3;

    public function upload($data)
    {



        if (!empty($data)) {
            if (count($data)>$this->max_files){
                 $this->_registry->getController()->Flash->error('Limite de arvivos excedidos.');
                
            }
            foreach ($data as $file) {
                $filename=$file['name'];
                $file_tmp_name=$file['tmp_name'];
                $dir=WWW_ROOT.'img'.DS.'galerias';
                $allowed = array('png','jpeg','jpg');
                if (!in_array(substr(strchr($filename,'.'), 1),$allowed)){
                    $this->_registry->getController()->Flash->error('Erro ao carregar as imagens.');
                }elseif (is_uploaded_file($file_tmp_name)) {
                    move_uploaded_file($file_tmp_name,$dir.DS.Text::uuid().'-'.$filename);
                }
            }
        }
     
    }
}


        /* if(!empty($data)){  
        if (count($data)>$this->max_files) {
            $this->_registry->getController()->Flash->error('Limite de arvivos excedidos.');
            return $this->_registry->getController()->redirect(['controller'=>'menus','action'=>'add']);
        }
        foreach ($data as $file ) {
            $filename=$file['name'];
            $file_tmp_name=$file['tmp_name'];
            $file_ext=substr(strchr($filename,'.'), 1);
            $dir= WWW_ROOT.'img'.DS.'galerias'.DS.$galeria;
            
           if (is_uploaded_file($file_tmp_name)) {
                $filename=Text::uuid().'-'.$file_ext;
                $file_db=TableRegistry::get('Menus');
                $entity=$file_db->newEntity();
                $entity->image=$filename;
                $file_db->save($entity);
                move_uploaded_file($file_tmp_name,$dir.DS.$filename);
            }else{
                $this->_registry->getController()->Flash->error(__('The image could noot be saved.Please,try again'));
                return $this->_registry->getController()->redirect(['action'=>'index']);

            }
        }
        $this->_registry->getController()->Flash->success('The image has been saved');
        return $this->_registry->getController()->redirect(['action'=>'index.']);*/
