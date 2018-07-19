<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">person</i>
                      </div>
                        <div class="col-md-6">
                            <h4 class="card-title">Active User</h4>
                        </div>
                      <div class="col-md-6">
                          
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                      </div>
                      <div class="material-datatables">
                        <table id="activeUserTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>DOB</th>
                              <th>User Name</th>
                              <th>Email</th>
                              <th>Phone No</th>
                              <th>Referal NO</th>
                              <th>Date</th>                              
                              <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                              $i=1;
                              foreach ($user as $item){    
                                  ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$item->f_name;?></td>
                                    <td><?=$item->l_name;?></td>
                                    <td><?=date('d-m-Y',  strtotime($item->DOB));?></td>
                                    <td><?=$item->userName;?></td>
                                    <td><?=$item->email;?></td>
                                    <td><?=$item->phone_no;?></td>
                                    <td><?=$item->referal_id;?></td>
                                    <td><?=date('d-m-Y',  strtotime($item->create_date));?></td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                        <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                        <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
                                    </td>
                                </tr>
                              <?php 
                              $i++;
                              }
                                ?>
                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>DOB</th>
                              <th>User Name</th>
                              <th>Email</th>
                              <th>Phone No</th>
                              <th>Images</th>
                              <th>Date</th>                              
                              <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>