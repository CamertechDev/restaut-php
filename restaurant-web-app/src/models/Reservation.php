class Reservation {
    private $id;
    private $customerName;
    private $reservationTime;

    public function __construct($id, $customerName, $reservationTime) {
        $this->id = $id;
        $this->customerName = $customerName;
        $this->reservationTime = $reservationTime;
    }

    public function getId() {
        return $this->id;
    }

    public function getCustomerName() {
        return $this->customerName;
    }

    public function getReservationTime() {
        return $this->reservationTime;
    }

    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }

    public function setReservationTime($reservationTime) {
        $this->reservationTime = $reservationTime;
    }
}