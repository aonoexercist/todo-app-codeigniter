<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <ul class="list-unstyled">
            <li>
                <h4><?php echo $this->session->userdata('user_data')->email; ?></h4>
            </li>
            <li>
                <span><?php echo $this->session->userdata('user_data')->first_name. ' '. $this->session->userdata('user_data')->middle_name. ' '. $this->session->userdata('user_data')->last_name; ?></span>
            </li>
        </ul>

        <a href="<?php echo base_url(); ?>home/logout" class="btn btn-outline-primary">Logout</a>
    </nav>

    <br>

    <div class="container">
        <br>

        <div class="card">
            <div class="card-header">
                TODOS (<?php echo count($todos); ?>)
            </div>

            <div class="card-body">
                <form method="post">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="todo" id="todo" placeholder="Enter Todo" class="form-control" />
                        </div>
                        <div class="col">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                
                <br>

                <ul class="list-group">

                    <?php foreach($todos as $key=>$value): ?>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-1">
                                    <?php if ($value['check'] == '1'): ?>
                                        <input type="checkbox" class="form-check-input ml-2" data-id="<?= $value['id']; ?>" checked>
                                    <?php else: ?>
                                        <input type="checkbox" class="form-check-input ml-2" data-id="<?= $value['id']; ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="col-8">
                                    <span class="<?php echo 'todo-item-'.strval($value['id']); ?>"><?= $value['title']; ?></span>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-outline-info update" data-id="<?= $value['id']; ?>">update</button>
                                    <button class="btn btn-outline-danger delete" data-id="<?= $value['id']; ?>">delete</button>
                                </div>
                            </div>
                        </li>

                    <?php endforeach; ?>


                    <!-- <li class="list-group-item">
                        <div class="row">
                            <div class="col-1">
                                <input type="checkbox" class="form-check-input ml-2">
                            </div>
                            <div class="col-9">
                                Dapibus ac facilisis in
                            </div>
                            <div class="col-2">
                                <button class="btn btn-outline-info">edit</button>
                                <button class="btn btn-outline-danger">delete</button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-1">
                                <input type="checkbox" class="form-check-input ml-2">
                            </div>
                            <div class="col-9">
                                Morbi leo risus
                            </div>
                            <div class="col-2">
                                <button class="btn btn-outline-info">edit</button>
                                <button class="btn btn-outline-danger">delete</button>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
        
        <br>
    </div>
</body>

</html>



<script src="<?php echo base_url("js/jquery/jquery-3.6.0.js"); ?>"></script>
<script>
    const base_url = '<?php echo base_url();?>';
</script>
<script src="<?php echo base_url("js/index.js"); ?>"></script>