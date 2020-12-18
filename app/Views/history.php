<?php $this->extend('header'); ?>
<?php $this->section('content'); ?>
<div class="container">
  <h2>History</h2>           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>File Name</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Deleted Date</th>
      </tr>
    </thead>
    <tbody>
      <?php $count = 1; ?>
      <?php if(!empty($fileDatas)): ?>
      <?php foreach($fileDatas as $fileData): ?>
        <?php //echo "<pre>"; print_r($fileData);exit; ?>
      <tr>
        <td><?php echo $count++; ?></td>
        <td><?php echo $fileData['file_name']; ?></td>
        <td><?php echo ($fileData['is_deleted'] == 0)? 'Data Exist' : 'Data Deleted'; ?></td>
        <td><?php echo $fileData['created_at']; ?></td>
        <td><?php echo $fileData['deleted_at']; ?></td>
      </tr>
      <?php endforeach; ?>  
      <?php endif; ?>    
    </tbody>
  </table>
</div>
<?php $this->endSection(); ?>