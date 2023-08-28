USE craftbeerdb;

#answers the question: Which country has the beer in highest demand?
SELECT t3.Country_of_Origin, SUM(t1.Total_sold) as Total_Beers_Sold_From_Country FROM 
(SELECT Product_code, SUM(Amount) AS Total_sold FROM transactions GROUP BY Product_code) as t1 
	JOIN products t2 ON t1.Product_code = t2.Product_code 
	JOIN vendors t3 ON t2.Vendor_code = t3.Vendor_code
    WHERE t3.Country_of_Origin != ''
    GROUP BY Country_of_Origin
    ORDER BY Total_Beers_Sold_From_Country DESC;
    
    
select * from transactions;
#Which price point of beer sells the most (in Ruples / liter)?
SELECT t2.Retail_price / t2.Size AS Ruples_per_Liter, SUM(t1.Total_sold) as Total_Beers_Sold_At_Price_Point FROM 
(SELECT Product_code, SUM(Amount) AS Total_sold FROM transactions GROUP BY Product_code) as t1 
	JOIN products t2 ON t1.Product_code = t2.Product_code 
    WHERE t2.Retail_price != 0 AND t2.Size != 0
    GROUP BY Ruples_per_Liter
    ORDER BY Total_Beers_Sold_At_Price_Point DESC;
    
# What was the most popular beer and vendor?
SELECT t2.Name, SUM(t1.Total_sold) as Total_Beers_Sold FROM 
(SELECT Product_code, SUM(Amount) AS Total_sold FROM transactions GROUP BY Product_code) as t1 
	JOIN products t2 ON t1.Product_code = t2.Product_code 
    GROUP BY t2.Name
    ORDER BY Total_Beers_Sold DESC;

SELECT t2.Vendor_code, SUM(t1.Total_sold) as Total_Beers_Sold FROM 
(SELECT Product_code, SUM(Amount) AS Total_sold FROM transactions GROUP BY Product_code) as t1 
	JOIN products t2 ON t1.Product_code = t2.Product_code 
    GROUP BY t2.Vendor_code
    ORDER BY Total_Beers_Sold DESC;
    
#What were the most popular ABVs of the beers?
SELECT t2.ABV, SUM(t1.Total_sold) as Total_Beers_Sold FROM 
(SELECT Product_code, SUM(Amount) AS Total_sold FROM transactions GROUP BY Product_code) as t1 
	JOIN products t2 ON t1.Product_code = t2.Product_code 
    WHERE t2.ABV != 0
    GROUP BY t2.ABV
    ORDER BY Total_Beers_Sold DESC;