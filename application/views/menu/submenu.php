<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>

            <?php if ($this->session->flashdata('flash')) : ?>

                <?php endif; ?>


            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">ADD New Sub Menu</a>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td>
                            <?php if($sm['is_active']): ?>
                                <button type="text" class="badge badge-pill badge-success">Active</button>
                            <?php else: ?>
                                <button type="text" class="badge badge-pill badge-danger">Not Active</button>
                            <?php endif ?>
                            </td>
                            <td>
                                <a href="" class="badge badge-pill badge-success " data-toggle="modal" data-target="#edit<?= $sm['id'] ?>">edit</a>
                                <a href="<?= base_url(); ?>Menu/delete_menu/<?= $sm['id'] ?>" class="badge badge-pill badge-danger Tombol-Hapus">delete</a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>

                </tbody>

            </table>



        </div>
    </div>
    </div>
    </div>



    <!-- /.container-fluid -->


    <!-- End of Main Content -->

    <!-- MODAL -->




    <!-- Modal -->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">ADD New Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">

                            <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">

                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url">
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu icon">
                        </div>
                        <div class="form-group"></div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $no = 0;
    foreach ($subMenu as $sm) : $no++; ?>
        <div class="modal fade" id="edit<?= $sm['id'] ?>" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSubMenuModalLabel">Update Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu/edit'); ?>" method="post">

                        <div class="modal-body">

                            <input type="hidden" name="id" value="<?= $sm['id'] ?>">

                            <div class="form-group">

                                <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu title" value="<?= $sm['title']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value=""><option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                                    <?php foreach ($menu as $m) : ?>
                                        <?php if ($m['id'] == $menu_id) : ?>
                                            <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url" value="<?= $sm['url']; ?>">
                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu icon" value="<?= $sm['icon']; ?>">
                            </div>
                            <div class="form-group"></div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php endforeach; ?>