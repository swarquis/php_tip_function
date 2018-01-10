排序:
order by A (ASC),B (DESC) LIMIT n...--默认为asc

过滤
WHERE A = 'string'/A = intval
<>/!=--不等于
BETWEEN num1 AND num2
IS NULL--没有值(不等于0或者空字符串)

联合过滤
WHERE (A = num1 OR B = num2) AND C >= num3--优先处理AND连接的条件，如果先判断OR需要括号
WHERE A IN(num1,num2,...)--等同于多个OR条件，IN条件中可包含其他select子查询
WHERE A NOT IN(num1,num2,...)
NOT IN/BETWEEN/EXISTS

通配符
WHERE A LIKE '%keyword%'--%任意字符>=0,无法匹配NULL
WHERE A LIKE '_keyword'--只能匹配一个字符

正则
WHERE A REGEXP 'keyword'--REGEXP只要字段中出现符合的数据就会返回，LIKE是整行匹配
WHERE A REGEXP 'A|B|C...'--OR
WHERE A REGEXP '[abc] word'--a or b or c word
[^abc] --not [abc]
WHERE A REGEXP '\\.'--查找特殊符号要转义，mysql中是\\
\\-,\\\
*-->=0
+-->=1
?--0,1
{n}--=n
{n,}-->=n
{n,m}--between n and m
WHERE A REGEXP '\\([0-9] abc?\\)'--ab, abc
WHERE A REGEXP '^[0-9\\.]'--0-9,.开始

函数处理字段
SELECT Concat(field1, ' (', field2, ')') AS alias from table...--注意空格
RTrim--去掉右边空格RTrim(field1)
SELECT a,b,c*d as total from ...--计算
SELECT Upper(field1) as field1_upper from ...--内容大写
Left()--返回左边字符
Length()--内容长度
Locate()--找出其中一部分字符
Lower()--全部小写
Right()--右边字符
Soundex()--Soundex值，对内容发音所代表的字母数字算法
SubString()--返回一部分字符串

SELECT a from table where b = 'c';
select a from table where Soundex(b) = Soundex('c');--对比读音
日期函数
格式yyyy-mm-dd	
where Date(date) = '2000-01-01';--Date(date)直接去日期部分的数据，不考虑精确时分秒
where Date(date) BETWEEN '2000-01-01' AND '2000-01-31'--between指定日期范围
where Year(date) = 2000 AND Month(date) = 1;
DateDiff()--日期差 
Date_Add()
DayOfWeek()
Now()

数值处理
Abs(),Cos(),Exp(),Mod(),Pi(),Rand(),Sin(),Sqrt(),Tan()

汇总
聚集函数
对field1字段的汇总信息，也可用where附加范围，一个函数对应一个字段
AVG(field1)，AVG(DISTINCT field1)--只考虑不同价格的平均值
COUNT(field1)--null值被会略，*则不会
MAX(field1)
MIN(field1)
SUM(field1)

分组
GROUP BY field HAVING condition--制定字段不能是alias
where在数据分组前过滤，having在数据分组后过滤
select field1 from table where condition1 order by field having condition2 order by ...--order by 确保排序顺序
顺序：select from where group by having order by limit

子查询
sql1 = select a from b where ...
sql2 = select a2  from b2 where c2 in (sql1)--确保列的匹配，多表联查时加上表前缀避免字段名重复


