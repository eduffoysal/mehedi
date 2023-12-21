<?php
class OrderList{
    private $id;
    private $uniqueId;
    private $bId;
    private $userId;
    private $bookOrder;
    private $proId;
    private $proName;
    private $proImage;
    private $proType;
    private $orderBookedId;
    private $quantity;
    private $price;
    private $totalPrice;
    private $design;
    private $side = 1;
    private $per;

    // Constructor without id
    public function productList($bId, $userId, $bookOrder, $proId, $orderBookedId, $quantity, $price, $proName, $proImage, $proType,$design,$side,$per) {
        $this->bId = $bId;
        $this->userId = $userId;
        $this->bookOrder = $bookOrder;
        $this->proId = $proId;
        $this->proName = $proName;
        $this->proImage = $proImage;
        $this->proType = $proType;
        $this->orderBookedId = $orderBookedId;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->totalPrice = $this->quantity * $this->price;
        $this->design = $design;
        $this->side = $side;
        $this->per = $per;

        if($this->side==2){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==3){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==4){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==0){
            $this->totalPrice=$this->totalPrice * (1 * ($this->per / 100));
        }

    }

    // Constructor with id
    public function orderList($id, $uniqueId, $bId, $userId, $bookOrder, $proId, $orderBookedId, $quantity, $price, $proName, $proImage, $proType,$design,$side,$per) {
        $this->id = $id;
        $this->uniqueId = $uniqueId;
        $this->bId = $bId;
        $this->userId = $userId;
        $this->proName = $proName;
        $this->proImage = $proImage;
        $this->proType = $proType;
        $this->bookOrder = $bookOrder;
        $this->proId = $proId;
        $this->orderBookedId = $orderBookedId;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->totalPrice = $this->quantity * $this->price;
        $this->design = $design;
        $this->side = $side;
        $this->per = $per;

        if($this->side==2){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==3){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==4){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==0){
            $this->totalPrice=$this->totalPrice * (1 * ($this->per / 100));
        }
    }

    public function setDesign($design) {
        $this->design = $design;
    }

    // Getter for $design
    public function getDesign() {
        return $this->design;
    }

    // Setter for $side
    public function setSide($side) {
        $this->side = $side;
    }

    // Getter for $side
    public function getSide() {
        return $this->side;
    }

    // Setter for $per
    public function setPer($per) {
        $this->per = $per;
    }

    // Getter for $per
    public function getPer() {
        return $this->per;
    }

    public function setProName($proName) {
        $this->proName = $proName;
    }

    public function setProImage($proImage) {
        $this->proImage = $proImage;
    }

    public function setProType($proType) {
        $this->proType = $proType;
    }

    // Getter methods for the new properties
    public function getProName() {
        return $this->proName;
    }

    public function getProImage() {
        return $this->proImage;
    }

    public function getProType() {
        return $this->proType;
    }

    // Setter methods
    public function setId($id) {
        $this->id = $id;
    }

    public function setUniqueId($uniqueId) {
        $this->uniqueId = $uniqueId;
    }

    public function setBId($bId) {
        $this->bId = $bId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setBookOrder($bookOrder) {
        $this->bookOrder = $bookOrder;
    }

    public function setProId($proId) {
        $this->proId = $proId;
    }

    public function setOrderBookedId($orderBookedId) {
        $this->orderBookedId = $orderBookedId;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    
    public function setTotalPrice() {
        $this->totalPrice = $this->quantity * $this->price;

        if($this->side==2){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==3){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==4){
            $this->totalPrice=$this->totalPrice * ($this->side * ($this->per / 100));
        }elseif($this->side==0){
            $this->totalPrice=$this->totalPrice * (1 * ($this->per / 100));
        }

    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getUniqueId() {
        return $this->uniqueId;
    }

    public function getBId() {
        return $this->bId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getBookOrder() {
        return $this->bookOrder;
    }

    public function getProId() {
        return $this->proId;
    }

    public function getOrderBookedId() {
        return $this->orderBookedId;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getPrice() {
        return $this->price;
    }
    
    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function saveToCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cartKey = ($this->bookOrder == 1) ? 'design_cart' : 'product_cart';
        $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

        $listData = [
            'id' => $this->id,
            'uniqueId' => $this->uniqueId,
            'bId' => $this->bId,
            'userId' => $this->userId,
            'bookOrder' => $this->bookOrder,
            'proId' => $this->proId,
            'proName' => $this->proName,
            'proImage' => $this->proImage,
            'proType' => $this->proType,
            'orderBookedId' => $this->orderBookedId,
            'quantity' => $this->quantity,
            'totalPrice' => $this->totalPrice,
            'price' => $this->price,
            'design' => $this->design,
            'side' => $this->side,
            'per' => $this->per
        ];

        $cart[] = $listData;

        $_SESSION[$cartKey] = $cart;
        return 1;
    }

    public static function convertSessionToObject($sessionData) {
        $list = new OrderList();
        
        $list->setId($sessionData['id']);
        $list->setUniqueId($sessionData['uniqueId']);
        $list->setBId($sessionData['bId']);
        $list->setUserId($sessionData['userId']);
        $list->setBookOrder($sessionData['bookOrder']);
        $list->setProId($sessionData['proId']);
        $list->setProName($sessionData['proName']);
        $list->setProImage($sessionData['proImage']);
        $list->setProType($sessionData['proType']);
        $list->setOrderBookedId($sessionData['orderBookedId']);
        $list->setQuantity($sessionData['quantity']);
        $list->setPrice($sessionData['price']);
        $list->setDesign($sessionData['design']);
        $list->setSide($sessionData['side']);
        $list->setPer($sessionData['per']);
        $list->setTotalPrice();

        return $list;
    }


    public function saveToDCart() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION['design_cart']) ? $_SESSION['design_cart'] : [];

        $listData = [
            'id' => $this->id,
            'uniqueId' => $this->uniqueId,
            'bId' => $this->bId,
            'userId' => $this->userId,
            'bookOrder' => $this->bookOrder,
            'proId' => $this->proId,
            'proName' => $this->proName,
            'proImage' => $this->proImage,
            'proType' => $this->proType,
            'orderBookedId' => $this->orderBookedId,
            'quantity' => $this->quantity,
            'totalPrice' => $this->totalPrice,
            'price' => $this->price,
            'design' => $this->design,
            'side' => $this->side,
            'per' => $this->per
        ];

        $cart[] = $listData;

        $_SESSION['design_cart'] = $cart;
        return 1;
    }

    public function saveToPCart() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION['product_cart']) ? $_SESSION['product_cart'] : [];

        $listData = [
            'id' => $this->id,
            'uniqueId' => $this->uniqueId,
            'bId' => $this->bId,
            'userId' => $this->userId,
            'bookOrder' => $this->bookOrder,
            'proId' => $this->proId,
            'proName' => $this->proName,
            'proImage' => $this->proImage,
            'proType' => $this->proType,
            'orderBookedId' => $this->orderBookedId,
            'quantity' => $this->quantity,
            'totalPrice' => $this->totalPrice,
            'price' => $this->price,
            'design' => $this->design,
            'side' => $this->side,
            'per' => $this->per
        ];

        $cart[] = $listData;

        $_SESSION['product_cart'] = $cart;
        return 1;
    }


    public static function removeFromCart($cartKey, $index) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

        if (isset($cart[$index])) {
            unset($cart[$index]);

            $cart = array_values($cart);

            $_SESSION[$cartKey] = $cart;

            return true;
        }

        return false;
    }


    public static function calculatePrice($cartKey) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }

    
public static function calculateTotalPrice($cartKey) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['totalPrice'];
    }

    return $totalPrice;
}

    public static function calculateTotalQuantity($cartKey) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

        $totalQuantity = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
        }

        return $totalQuantity;
    }


    public static function increaseQuantity($cartKey, $index) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

        if (isset($cart[$index])) {
            $cart[$index]['quantity']++;

            $cart[$index]['totalPrice'] = $cart[$index]['price'] * $cart[$index]['quantity'];

            $_SESSION[$cartKey] = $cart;

            return true;
        }

        return false;
    }

    public static function decreaseQuantity($cartKey, $index) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

        if (isset($cart[$index])) {

            if ($cart[$index]['quantity'] > 1) {

                $cart[$index]['quantity']--;

                $cart[$index]['totalPrice'] = $cart[$index]['price'] * $cart[$index]['quantity'];

                $_SESSION[$cartKey] = $cart;

                return true;
            }
        }

        return false;
    }


    public static function setDesignSide($cartKey, $index, $side) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!is_int($side)) {
            $side = intval($side);    
        }
    
        $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];
    
        if (isset($cart[$index])) {
            $cart[$index]['side'] = $side;
    
            if($side==2){
                $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * ($side * ($cart[$index]['per'] / 100));
            }elseif($side==3){
                $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * ($side * ($cart[$index]['per'] / 100));
            }elseif($side==4){
                $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * ($side * ($cart[$index]['per'] / 100));
            }elseif($side==0){
                $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * (1 * ($cart[$index]['per'] / 100));
            }else{
                $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'];
            }
    
            $_SESSION[$cartKey] = $cart;
    
            return true;
        }
    
        return false;
    }



}

function removeFromCart($cartKey, $index) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    if (isset($cart[$index])) {
        unset($cart[$index]);

        $cart = array_values($cart);

        $_SESSION[$cartKey] = $cart;

        return true;
    }

    return false;
}

function convertSessionToObjects($cartKey) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];


    $listObjects = [];
    foreach ($cart as $item) {
        $listObjects[] = OrderList::convertSessionToObject($item);
    }

    return $listObjects;
}




function calculatePrice($cartKey) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }

    return $totalPrice;
}


function calculateTotalPrice($cartKey) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['totalPrice'];
    }

    return $totalPrice;
}

    function calculateTotalQuantity($cartKey) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    $totalQuantity = 0;
    foreach ($cart as $item) {
        $totalQuantity += $item['quantity'];
    }

    return $totalQuantity;
}



function increaseQuantity($cartKey, $index) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    if (isset($cart[$index])) {
        $cart[$index]['quantity']++;

        $cart[$index]['totalPrice'] = $cart[$index]['price'] * $cart[$index]['quantity'];

        $_SESSION[$cartKey] = $cart;

        return true;
    }

    return false;
}

function decreaseQuantity($cartKey, $index) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    if (isset($cart[$index])) {

        if ($cart[$index]['quantity'] > 1) {

            $cart[$index]['quantity']--;

            $cart[$index]['totalPrice'] = $cart[$index]['price'] * $cart[$index]['quantity'];

            $_SESSION[$cartKey] = $cart;

            return true;
        }
    }

    return false;
}




function convertSessionToObject($sessionData) {
    $list = new OrderList();
    
    $list->setId($sessionData['id']);
    $list->setUniqueId($sessionData['uniqueId']);
    $list->setBId($sessionData['bId']);
    $list->setUserId($sessionData['userId']);
    $list->setBookOrder($sessionData['bookOrder']);
    $list->setProId($sessionData['proId']);
    $list->setProName($sessionData['proName']);
    $list->setProImage($sessionData['proImage']);
    $list->setProType($sessionData['proType']);
    $list->setOrderBookedId($sessionData['orderBookedId']);
    $list->setQuantity($sessionData['quantity']);
    $list->setPrice($sessionData['price']);
    $list->setDesign($sessionData['design']);
    $list->setSide($sessionData['side']);
    $list->setPer($sessionData['per']);
    $list->setTotalPrice();

    return $list;
}

function setDesignSide($cartKey, $index, $side) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!is_int($side)) {
        $side = intval($side);    
    }

    $cart = isset($_SESSION[$cartKey]) ? $_SESSION[$cartKey] : [];

    if (isset($cart[$index])) {
        $cart[$index]['side'] = $side;

        // if($side==2){
        //     $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * ($side * ($cart[$index]['per'] / 100));
        // }elseif($side==3){
        //     $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * ($side * ($cart[$index]['per'] / 100));
        // }elseif($side==4){
        //     $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * ($side * ($cart[$index]['per'] / 100));
        // }elseif($side==0){
        //     $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * (1 * ($cart[$index]['per'] / 100));
        // }else{
        //     $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'];
        // }
        $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'];
        if($side!=1){

            $multiplier = ($side == 2 || $side == 3 || $side == 4) ? $side : 1;
            $cart[$index]['totalPrice'] = $cart[$index]['totalPrice'] * ($multiplier * ($cart[$index]['per'] / 100));
    
        }elseif($side==0){
            $cart[$index]['totalPrice']=$cart[$index]['price'] * $cart[$index]['quantity'] * (1 * ($cart[$index]['per'] / 100));
        }

        $_SESSION[$cartKey] = $cart;

        return true;
    }

    return false;
}

?>