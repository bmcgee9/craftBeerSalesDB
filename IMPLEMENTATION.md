# IMPLEMENTATION
## Brett McGee

To implement my database, I utilized my step by step 
[Build Plan](https://github.com/bmcgee9/craftBeerSalesDB/blob/main/buildPlan.md). </br>
</br>
In order not to be repetitive, I will give a quick step by step guide of how I implemented my database.

### Step 1: Using the data table import wizard in mySQL Workbench. 
</br>
I imported Transactions2.csv as the transactions table, beersNoCountriesToImport.csv as the products table, and vendorsToImport2.csv as the vendors table.

It is worth noting that I spent a large amount of time editing the excel sheets so that they could run smoothly. These changes included: 
- Adding the order_id column in the transactions table
- Deleting redundant columns from the transactions table
- Manually adding appropriate missing Vendor_codes in the products table
- Decomposing the products table into the products and vendors tables by taking of the Country_of_Origin column in the products table. The vendors table consists of 2 columns being the Vendor_Code and Country_of_Origin columns
- Delete duplicate rows from the new vendors table because there are a lot of them
