<div class="card main-card shadow-sm p-md-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <form method="POST">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name="name" value="<?php echo $student->name; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $student->email; ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="progress" class="form-label">Progress</label>
                    <input type="number" class="form-control" id="progress" name="progress" value="<?php echo $student->progress; ?>" aria-describedby="emailHelp" max="100">
                </div>
                <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <a href="index.php" class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>