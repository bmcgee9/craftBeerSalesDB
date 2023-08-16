Use craftbeerdb;
SET SQL_SAFE_UPDATES = 0;

#make Product_code a primary key in the products table
ALTER TABLE products ADD PRIMARY KEY (Product_code);

#change Vendor_code column to be a varchar data type instead of text type
ALTER TABLE products MODIFY COLUMN Vendor_code VARCHAR(255);
ALTER TABLE vendors MODIFY COLUMN Vendor_code VARCHAR(255);


-- SELECT transactions.Product_code, products.Product_code
-- FROM transactions
-- LEFT JOIN products ON transactions.Product_code = products.Product_code
-- WHERE products.Product_Code IS NULL
-- ORDER BY transactions.Product_code ASC;

# delete the transactions using the missing product codes
DELETE FROM transactions WHERE Product_code = 2395 OR Product_code = 3046;

#make order_id a primary key in the transactions table
ALTER TABLE transactions ADD PRIMARY KEY (order_id);

#make vendor_code a primary key in the vendors table
ALTER TABLE vendors ADD PRIMARY KEY (Vendor_code);

#make vendor_code a foreign key in products table connecting to the vendor_code in the vendors table
ALTER TABLE products ADD FOREIGN KEY (Vendor_code) REFERENCES vendors(Vendor_code);

#make product_code a foreign key in the transactions table referening the product_code in the products table
ALTER TABLE transactions ADD FOREIGN KEY (Product_code) REFERENCES products(Product_code);

SET SQL_SAFE_UPDATES = 1;