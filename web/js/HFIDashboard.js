/*
** QueryBuilder
*/

$('#builder').queryBuilder({
      filters: [{
        id: 'zone_pedo',
        label: 'Zone pédologique',
        type: 'string',
        input: 'select',
        values: {
          1: '1a',
          2: '1b',
          3: '1c',
          4: '2a',
          5: '2b',
          6: '2c',
          7: '2d',
          8: '2e',
          9: '2f',
          10: '3a',
          11: '3b',
          12: '4a',
          13: '4b',
          14: '5a',
          15: '5b',
          16: '5c',
          17: '6a',
          18: '6b',
          19: '7a',
          20: '7b',
          21: '8',
          22: '9',
          23: '10'
        }
      }, {
        id: 'distance_a_mer_reel',
        label: 'Distance à la mer',
        type: 'integer',
      }, {
        id: 'suivi_biannuelle',
        label: 'Suivi biannuelle',
        type: 'boolean',
      }, {
        id: 'date_plantation',
        label: 'Date de plantation',
        type: 'date',
        validation: {
          format: 'YYYY/MM/DD'
        },
        plugin: 'datepicker',
        plugin_config: {
          format: 'yyyy/mm/dd',
          todayBtn: 'linked',
          todayHighlight: true,
          autoclose: true
        }
      },
      ]
    });
