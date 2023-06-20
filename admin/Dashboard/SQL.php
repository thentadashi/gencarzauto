?>
			
Getting Top 5 Products

SELECT tblorder.PROID, SUM(ORDEREDQTY) AS TotalQuantity ,PRODESC AS Description , IMAGES AS IMAGES, PROQTY AS Available_Quantity
FROM tblorder JOIN tblproduct on tblproduct.PROID = tblorder.PROID
GROUP BY tblorder.PROID 
ORDER BY SUM(ORDEREDQTY) DESC
LIMIT 5;	

Getting Top 5 Customer

SELECT tblsummary.CUSTOMERID, SUM(PAYMENT) AS TotalSales, EMAILADD as Email, CUSPHOTO as Image
FROM tblsummary JOIN tblcustomer on tblcustomer.CUSTOMERID = tblsummary.CUSTOMERID
GROUP BY tblsummary.CUSTOMERID 
ORDER BY SUM(PAYMENT) DESC
LIMIT 5;

Getting Top 5 Customer with Cancelled Transaction not counting

	SELECT tblsummary.CUSTOMERID, SUM(PAYMENT) AS TotalSales, EMAILADD as Email, CUSPHOTO as Image , status as Status, CITYADD AS City, DATEJOIN as djoin , FNAME as Name FROM tblsummary JOIN tblcustomer on tblcustomer.CUSTOMERID = tblsummary.CUSTOMERID 
	where tblsummary.ORDEREDSTATS != 'Cancelled'
	GROUP BY tblsummary.CUSTOMERID 
	ORDER BY SUM(PAYMENT) DESC LIMIT 5"

Getting Order Today

SELECT * FROM tblsummary WHERE ORDEREDDATE = DATE(NOW());


GETTING SUM
SELECT tblorder.PROID , SUM(ORDEREDQTY) AS QTY FROM `tblorder`WHERE PROID ='201743'

SELECT SUM(PAYMENT) as Total FROM `tblsummary` where ORDEREDSTATS != 'Cancelled';


GETTING AGE

select patient_date_of_birth, patient_id,
case when right('00' + cast(month(Date(now())) as varchar(2)),2) + right('00' + cast(day(date(now())) as varchar(2)),2) >=
right('00' + cast(month(patient_date_of_birth) as varchar(2)),2) + right('00' + cast(day(patient_date_of_birth) as varchar(2)),2)
then year(date(now())) - year(patient_date_of_birth)
else year(date(now())) - year(patient_date_of_birth) - 1
end age
from patient_table WHERE patient_id = 4;