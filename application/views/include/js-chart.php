<script language='javascript'>
$(function () {
<?php
$session_data = $this->session->userdata('logged_in');
$username = $session_data['username'];
?>
    //BEGIN BAR CHART
	<?php
	$query = $this->db->query("select * from result inner join result_temp where result.username='".$username."' and result_temp.kategori_2='0'");
	?>
    var d3 = [
	<?php
	foreach($query->result() as $isi)
	{
	$arraytotal["".$isi->kategori_1.""] = $isi->hasil;
	?>
	["<?php echo $isi->kategori_1;?>", <?php echo $isi->hasil;?>],
	<?php
	}
	?>
	];
    $.plot("#bar-chart", [{
        data: d3,
        color: "#01b6ad"
    }], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END BAR CHART

	//BEGIN BAR CHART STACK
	<?php
	$query = $this->db->query("select * from result inner join result_temp where result.username='".$username."' and result_temp.kategori_1='Female' and result_temp.kategori_2!='0'");
	?>
    var d4_1 = [
	<?php
	foreach($query->result() as $isi)
	{
	$male = $arraytotal["".$isi->kategori_2.""] - $isi->hasil;
	?>
	["<?php echo $isi->kategori_2;?>", <?php echo $male;?>],
	<?php
	}
	?>
	];
    var d4_2 = [
	<?php
	foreach($query->result() as $isi)
	{
	?>
	["<?php echo $isi->kategori_2;?>", <?php echo $isi->hasil;?>],
	<?php
	}
	?>
	];
    $.plot("#bar-chart-stack", [{
        data: d4_1,
        label: "Male",
        color: "#3DB9D3"
    },{
        data: d4_2,
        label: "Female",
        color: "#ffce54"
    }], {
        series: {
            stack: !0,
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END BAR CHART STACK
	
	//BEGIN LINE CHART
	<?php
	$query = $this->db->query("select * from result inner join result_temp where result.username='".$username."' and result_temp.kategori_1='16-25 tahun' and result_temp.kategori_2!='0'");
	?>
    var d1_1 = [
	<?php
	foreach($query->result() as $isi)
	{
	$age = $arraytotal["".$isi->kategori_2.""] - $isi->hasil;
	?>
	["<?php echo $isi->kategori_2;?>", <?php echo $age;?>],
	<?php
	}
	?>
	];
    var d1_2 = [
	<?php
	foreach($query->result() as $isi)
	{
	?>
	["<?php echo $isi->kategori_2;?>", <?php echo $isi->hasil;?>],
	<?php
	}
	?>
	];
    $.plot("#line-chart", [{
        data: d1_1,
        label: "> 25 Tahun",
        color: "#ffce54"
    },{
        data: d1_2,
        label: "<= 25 Tahun",
        color: "#3DB9D3"
    }], {
        series: {
            lines: {
                show: !0,
                fill: .01
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END LINE CHART
	
	//BEGIN LINE CHART 2
	<?php
	$query = $this->db->query("select * from result inner join result_temp where result.username='".$username."' and result_temp.kategori_1='Sentiment +' and result_temp.kategori_2!='0'");
	?>
    var d1_1 = [
	<?php
	foreach($query->result() as $isi)
	{
	?>
	["<?php echo $isi->kategori_2;?>", <?php echo $isi->hasil;?>],
	<?php
	}
	?>
	];
    var d1_2 = [
	<?php
	$query = $this->db->query("select * from result inner join result_temp where result.username='".$username."' and result_temp.kategori_1='Sentiment -' and result_temp.kategori_2!='0'");
	foreach($query->result() as $isi)
	{
	?>
	["<?php echo $isi->kategori_2;?>", <?php echo $isi->hasil;?>],
	<?php
	}
	?>
	];
    $.plot("#line-chart-2", [{
        data: d1_1,
        label: "Sentiment +",
        color: "#ffce54"
    },{
        data: d1_2,
        label: "Sentiment -",
        color: "#3DB9D3"
    }], {
        series: {
            lines: {
                show: !0,
                fill: .01
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END LINE CHART

});


</script>