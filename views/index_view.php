<div class="row align-items-center mb-4">
    <div class="col">
        <h2 class="h3 text-dark m-0">Students Overview</h2>
        <p class="text-muted small">Manage your students and their academic progress</p>
    </div>
    <div class="col-auto">
        <a href="create.php" class="btn btn-primary px-4"><i class="fa-regular fa-square-plus"></i> Add</a>
    </div>
</div>

<div class="card main-card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-muted text-uppercase small">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Student Details</th>
                        <th>Progress</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): extract($row); ?>
                        <tr>
                            <td class="ps-4 text-muted"><?php echo $id; ?></td>
                            <td>
                                <div class="fw-bold text-dark"><?php echo $name; ?></div>
                                <div class="small text-muted"><?php echo $email; ?></div>
                            </td>
                            <td style="min-width: 150px;">
                                <div class="d-flex align-items-center">
                                    <div class="progress flex-grow-1" style="height: 6px; border-radius: 10px;">
                                        <div class="progress-bar bg-success"
                                            style="width: <?php echo $progress; ?>%">
                                        </div>
                                    </div>
                                    <span class="ms-2 small fw-bold text-muted"><?php echo $progress; ?>%</span>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-outline-dark btn-sm me-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <a href="delete.php?id=<?php echo $id; ?>"
                                    class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>"><i class="fa-solid fa-arrow-left-long"></i></a>
                    </li>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>"><i class="fa-solid fa-arrow-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>