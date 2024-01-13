 <!-- Header -->
 <header class="bg-surface-primary border-bottom pt-6" style="margin-bottom: 20px;">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center py-4">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight"> Welcome <?php echo $_SESSION['username'];?></h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a> -->
                                <a href="create_card_companyname.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>