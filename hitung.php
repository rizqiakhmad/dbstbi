<?php
function hitungSim($query)
{
		$host='localhost';
		$user='root';
		$pass='';
		$database='dbstbi';
		$conn=mysql_connect($host,$user,$pass);
		mysql_select_db($database);
		//ambil jumlah total dokumen yang telah diindex
		//(tbindex atau tbvektor), n
		$resn = mysql_query("SELECT Count(*) as n FROM tbindex");
		$rown = mysql_fetch_array($resn);
		$n = $rown['n'];
		//terapkan preprocessing terhadap $query
		$aquery = explode(" ", $query);
		//hitung panjang vektor query
		$panjangQuery = 0;
		$aBobotQuery = array();
	for ($i=0; $i<count($aquery); $i++) 
		{
			//hitung bobot untuk term ke-i pada query, log(n/N);
			//hitung jumlah dokumen yang mengandung term tersebut
			$resNTerm = mysql_query("SELECT Count(*) as N FROM tbindex WHERE Term = '$aquery[$i]'");
			$rowNTerm = mysql_fetch_array($resNTerm);
			$NTerm = $rowNTerm['N'];
			$idf = log($n/$NTerm);
			//simpan di array
			$aBobotQuery[] = $idf;
			$panjangQuery = $panjangQuery + $idf * $idf;
		}
		
		$panjangQuery = sqrt($panjangQuery);
		$jumlahmirip = 0;
		//ambil setiap term dari DocId, bandingkan dengan Query
		$resDocId = mysql_query("SELECT * FROM tbvektor ORDER BY DocId");
		while ($rowDocId = mysql_fetch_array($resDocId)) 
		{
			$dotproduct = 0;
			$docId = $rowDocId['DocId'];
			$panjangDocId = $rowDocId['Panjang'];
			$resTerm = mysql_query("SELECT * FROM tbindex WHERE DocId = $docId");
			while ($rowTerm = mysql_fetch_array($resTerm)) 
			{
				for ($i=0; $i<count($aquery); $i++) 
					{
						//jika term sama
						if ($rowTerm['Term'] == $aquery[$i]) 
							{
							$dotproduct = $dotproduct +
							$rowTerm['Bobot'] * $aBobotQuery[$i];
							} //end if
					} //end for $i
			} //end while ($rowTerm)
			if ($dotproduct > 0) 
				{
					$sim = $dotproduct / ($panjangQuery * $panjangDocId);
					//simpan kemiripan > 0 ke dalam tbcache
					$resInsertCache = mysql_query("INSERT INTO tbcache(Query, DocId, Value) VALUES ('$query', '$docId', $sim)");
					$jumlahmirip++;
					mysql_query ($resInsertCache);
				}
		} //end while $rowDocId
	if ($jumlahmirip == 0) 
	{
		$resInsertCache = mysql_query("INSERT INTO tbcache(Query, DocId, Value) VALUES ('$query', 0, 0)");
		mysql_query ($resInsertCache);
	}
} //end hitungSim()
?>