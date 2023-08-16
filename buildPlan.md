# Database build plan
## Brett McGee

1) In excel, add an order_id column to the transactions table

    Do this by creating the new column, setting the first cell in it to 1 and then create a formula in the next cell down adding 1 to the previous cell and apply it to all cells in column.

3) In excel, take out redundant columns in the transactions table (discount_amount and product_markup) since they can be calculated using the other tables and aren't really used in my planned analysis.

    This actually takes away the transitive dependencies in the transactions table that kept it from getting to 3nf.

4) In excel, go through the products table and make sure that all of the real products have a vendor_code.
   
    4.1) Delete all of the rows that have no vendor_code and no retail_price since this means there is no way for them to be ordered.
    4.2) Find all of the rows that don't have a vendor_code and set the vendor_code to the first word of the name, and then manually go through each row and check to make sure that the vendor_code is correct or change it if it is more than the first word.

5) In excel, create another excel sheet that is just vendor_code and its matching Country_of_origin, and then remove all duplicate rows using the remove duplicates button in the data tools section.

6) Delete the Country_of_origin column from products excel sheet
   
7) Review all data in all three tables to ensure they have consistent formating
   
8) Import the transactions, products, and vendors tables using the "Table Data Import Wizard" tool you find after right clicking the schema
   
9) Ensure that product_code and order_id and vendor_code are primary keys in their respective tables

   You will need to use an `ALTER TABLE` statement to set product_code to a primary key

10) Add product_code as a foreign key to the transactions table and add vendor_code as a foreign key to the products table

   You will need to use an `ALTER TABLE` statement to set product_code to a foreign key
