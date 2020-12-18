<?php namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
    {       

        $this->fileListModel = new \App\Models\FileListModel();
        $session = \Config\Services::session();
        
        helper(['form', 'url']);    
    }

	public function index()
	{		
		$pager = \Config\Services::pager();
		$validation = array();
		$this->data['validation'] = $validation;
		
		$this->data = [
            'fileDatas' => $this->fileListModel->select('*')->where('is_deleted', 0)->paginate(2),
            'pager' => $this->fileListModel->pager
        ];
		
		return view('dashboard', $this->data);
	}

	public function documentUpload() {
		$validation = \Config\Services::validation();
		$files = $this->request->getFiles();
		$rules = $this->fileListModel->getRule('registration');

		if ($this->validate($rules)) {
			if($this->request->getFiles()) {
				$file = $this->request->getFile('file_name');
                $fileName = $file->getName();
                if($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $filePath = USER_IMAGE_UPLOAD_PATH;
                    $file->move($filePath, $newName);
                    $fileData = [                        
                        'file_name' => $fileName,
                        'created_at' => date('Y-m-d H:i:s')
                	];
                	//echo "<pre>";print_r($fileData);exit;

                	if (! $this->fileListModel->save($fileData)) {
	                    return redirect()->to('/')->with('error', 'Error on uploading!');
	                }else {
	                	return redirect()->to('/')->with('success', 'Uploaded successfully!');
	                }
                }
			}
		}
	$fileDatas = $this->fileListModel->findAll();
	$this->data = [
            'fileDatas' => $this->fileListModel->select('*')->where('is_deleted', 0)->paginate(2),
            'pager' => $this->fileListModel->pager
        ];
	$this->data['validation'] = $validation;
	return view('dashboard', $this->data);

	}	

	public function deleteFile() {
		$id =  $this->request->getPost('id');
		$fileData = [                        
                        'is_deleted' => 1,
                        'deleted_at' => date('Y-m-d H:i:s')
                	];
        $this->fileListModel->update($id, $fileData);
		
	}

	public function history() {
		$pager = \Config\Services::pager();
		
		$this->data = [
            'fileDatas' => $this->fileListModel->paginate(2),
            'pager' => $this->fileListModel->pager
        ];
		
		return view('history', $this->data);
	}

} 
