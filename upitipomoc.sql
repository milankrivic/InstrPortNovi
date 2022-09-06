use aferihem_instr;

select
year(pr.DatumPrimanja) as 'Godina',
month(pr.DatumPrimanja) as 'Mjesec',
pr.Iznos
from primanja pr order by year(pr.DatumPrimanja) desc, month(pr.DatumPrimanja) desc;


select
sum(pr.Iznos)
from primanja pr where year(pr.DatumPrimanja) = 2016;

select
avg(pr.Iznos)
from primanja pr where year(pr.DatumPrimanja) = 2016;


create table rezervacije
(IdRezervacije int primary key auto_increment not null,
Ime varchar(30),
Prezime varchar(30),
Email varchar(30),
Mobitel varchar(30),
TipUsluga int,
constraint fk_TipUsluga foreign key (TipUsluga) references usluga(IdUsluga));


-- izdaci sa primanjima

select
pr.Iznos,
pr.DatumPrimanja,
ti.Naziv as 'TipIzdatak',
ki.NazivIzdatak,
ki.DatumPlacanja,
ki.Iznos,
ki.Opis,
ki.placeno
from
primanja pr join knjizenjeizdatak ki
on year(pr.DatumPrimanja) = year(ki.DatumPlacanja)
and month(pr.DatumPrimanja) = month(ki.DatumPlacanja) 
join tipizdatak ti on
ki.IdTip = ti.IdTip;

-- summmm

select
pr.Iznos as 'IznosPrimanja',
year(pr.DatumPrimanja) as 'Godina',
month(pr.DatumPrimanja) as 'Mjesec',
sum(ki.Iznos) as 'UkupnoIzdaci',
(pr.Iznos-sum(ki.Iznos)) as 'Ostalo'
from
primanja pr join knjizenjeizdatak ki
on year(pr.DatumPrimanja) = year(ki.DatumPlacanja)
and month(pr.DatumPrimanja) = month(ki.DatumPlacanja) 
join tipizdatak ti on
ki.IdTip = ti.IdTip;

