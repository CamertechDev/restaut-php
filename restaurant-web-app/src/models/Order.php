class Order {
    private $id;
    private $menuItems;
    private $totalPrice;

    public function __construct($id, $menuItems = [], $totalPrice = 0) {
        $this->id = $id;
        $this->menuItems = $menuItems;
        $this->totalPrice = $totalPrice;
    }

    public function getId() {
        return $this->id;
    }

    public function getMenuItems() {
        return $this->menuItems;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function addMenuItem($menuItem) {
        $this->menuItems[] = $menuItem;
        $this->totalPrice += $menuItem->getPrice();
    }

    public function removeMenuItem($menuItem) {
        if (($key = array_search($menuItem, $this->menuItems)) !== false) {
            unset($this->menuItems[$key]);
            $this->totalPrice -= $menuItem->getPrice();
        }
    }
}