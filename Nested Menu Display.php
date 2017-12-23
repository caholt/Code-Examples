
<?php
$array = [
    'home' => [
        'name' => 'Label for Home',
        'link' => '#'
    ],
    'contact' => [
        'name' => 'Label for Contact',
        'link' => '#'
    ],
    'sitemap' => [
        'name' => 'Label for Sitemap',
        'link' => '#'
    ],
    'products' => [
        'name' => 'Label for Products',
        'link' => '#',
        'level' => [
            'product_man' => [
                'name' => 'Label for Man (into Producst)',
                'link' => '#',
                'level' => [
                    'product_man_shoes' => [
                        'name' => 'Label for Shoes  (into Man)',
                        'link' => '#',
                    ],
                    'product_man_belt' => [
                        'name' => 'Label for Belt (into Man)',
                        'link' => '#',
                    ],
                ]
            ],
            'produtc_woman' => [
                'name' => 'Label for Woman (into Producst)',
                'link' => '#',
                'level' => [
                    'product_woman_dress' => [
                        'name' => 'Label for Dress  (into Woman)',
                        'link' => '#',
                    ],
                    'product_woman_pantuhose' => [
                        'name' => 'Label for Pantyhose (into Woman)',
                        'link' => '#',
                    ],
                ]
            ],
        ]
    ]
];

function getChildren($Data)
{
			if(isset($Data['level']))
			{
				?><ul><?php 
				foreach($Data['level'] as $Child)
				{
					?><li><?php echo $Child['name'];
					getChildren($Child);
					 ?></li><?php 
				}
				?></ul><?php 
			}
}


?>

<ul>
	<?php 
	foreach($array as $Menu)
	{
		?>
		<li>
			<?php 
			echo $Menu['name'];
			getChildren($Menu);
			?>
		</li>
		<?php 
	}
	?>
</ul>
