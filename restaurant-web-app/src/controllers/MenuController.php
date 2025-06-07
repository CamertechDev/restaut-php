class MenuController {
    private $menuModel;

    public function __construct($menuModel) {
        $this->menuModel = $menuModel;
    }

    public function getMenu() {
        return $this->menuModel->getAllMenuItems();
    }

    public function addMenuItem($item) {
        return $this->menuModel->addItem($item);
    }

    public function removeMenuItem($itemId) {
        return $this->menuModel->removeItem($itemId);
    }
}