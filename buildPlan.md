# Database build plan
## Brett McGee

1) In excel, add an order_id column to the transactions table

    Do this by creating the new column, setting the first cell in it to 1 and then create a formula in the next cell down adding 1 to the previous cell and apply it to all cells in column.

3) In excel, take out redundant columns in the transactions table (discount_amount and product_markup) since they can be calculated using the other tables and aren't really used in my planned analysis.

    This actually takes away the transitive dependencies in the transactions table that kept it from getting to 3nf.

4) In excel, create another excel sheet that is just vendor_code and its matching Country_of_origin
   
5) Review all data in both tables to ensure they have consistent formating
   
6) Import the transactions, products, and vendors tables using the "Table Data Import Wizard" tool you find after right clicking the schema
   
7) Ensure that product_code and order_id and vendor_code are primary keys in their respective tables

   You will need to use an `ALTER TABLE` statement to set product_code to a primary key

8) Add product_code as a foreign key to the transactions table and add vendor_code as a foreign key to the products table

   You will need to use an `ALTER TABLE` statement to set product_code to a foreign key
