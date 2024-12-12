<?php
// Database connection
include 'db_connection.php';

// Array of items to be inserted
$items = [
    ['Espresso', 5.00, 'A rich and bold coffee to kickstart your day.'],
    ['Latte', 4.50, 'Delicious blend of espresso and steamed milk.'],
    ['Cappuccino', 4.75, 'A perfect balance of espresso, steamed milk, and foam.'],
    ['Cold Brew', 4.00, 'Smooth and refreshing, perfect for a hot day.'],
    ['Flat White', 4.25, 'Rich coffee with velvety milk texture.'],
    ['Irish Coffee', 6.00, 'A classic blend of coffee, Irish whiskey, and cream.'],
    ['Mocha', 5.50, 'Rich espresso with chocolate and steamed milk.'],
    ['Vanilla Latte', 4.75, 'Sweet vanilla flavor mixed with espresso and milk.'],
    ['Caramel Macchiato', 5.25, 'Espresso, steamed milk, and caramel syrup.'],
    ['Frappe', 4.50, 'Chilled coffee blended with milk and ice.'],
    ['Chai Latte', 4.00, 'Spiced tea blended with milk and espresso.'],
    ['Almond Milk Latte', 5.00, 'Delicious latte made with almond milk.'],
    ['Coconut Latte', 5.25, 'Sweet coconut flavor in a creamy latte.'],
    ['Matcha Latte', 4.75, 'Green tea powder mixed with steamed milk.'],
    ['Coffee Milkshake', 6.50, 'Refreshing coffee blended with ice cream.'],
    ['Iced Americano', 3.50, 'Strong and bold iced coffee.'],
    ['Iced Mocha', 5.75, 'Refreshing mocha served over ice.'],
    ['Vanilla Iced Coffee', 4.25, 'Sweet vanilla flavor in iced coffee.'],
    ['Turkish Coffee', 3.75, 'Strong coffee brewed in a unique way.'],
    ['Syphon Coffee', 7.00, 'Exquisite coffee brewed using a syphon method.']
];

// Prepare and execute insert queries
foreach ($items as $item) {
    $item_name = $item[0];
    $price = $item[1];
    $description = $item[2];

    $query = "INSERT INTO items (item_name, price, description) VALUES ('$item_name', $price, '$description')";

    if (mysqli_query($conn, $query)) {
        echo "Item $item_name inserted successfully.<br>";
    } else {
        echo "Error inserting $item_name: " . mysqli_error($conn) . "<br>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
