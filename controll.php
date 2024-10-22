<?php
class CategoryController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Handle category page request
    public function handleCategoryRequest($cate_id) {
        $category = $this->model->getCategoryById($cate_id);
        if ($category) {
            $books = $this->model->getBooksByCategory($cate_id);
            include 'views/CategoryView.php'; // Pass the data to the view
        } else {
            include 'views/ErrorView.php'; // Handle invalid category
        }
    }
}
?>