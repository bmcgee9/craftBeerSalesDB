# Database build plan
## Brett McGee

1) In excel, add an order_id column to the transactions table

    Do this by creating the new column, setting the first cell in it to 1 and then create a formula in the next cell down adding 1 to the previous cell and apply it to all         cells in column.

2) In excel, take out redundant columns in the transactions table (discount_amount and product_markup) since they can be calculated using the other tables and aren't really used in my planned analysis.

    This actually takes away the transitive dependencies in the transactions table that kept it from getting to 3nf.
   
4) Review all data in both tables to ensure they have consistent formating
   
5) Import both transactions and products tables using the "Table Data Import Wizard" tool you find after right clicking the schema
   
6) Ensure that product_code and order_id are primary keys in their respective tables

   You will need to use an `ALTER TABLE` statement to set product_code to a primary key

8) Add product_code as a foreign key to the transactions table

   You will need to use an `ALTER TABLE` statement to set product_code to a foreign key
