// @ts-nocheck
import React from 'react';
import { ApplyPluginsType } from 'G:/design/finaldesign/front/node_modules/@umijs/runtime';
import * as umiExports from './umiExports';
import { plugin } from './plugin';

export function getRoutes() {
  const routes = [
  {
    "path": "/",
    "component": require('@/pages/index').default,
    "exact": true
  },
  {
    "path": "/users",
    "component": require('@/layouts/users.tsx').default,
    "routes": [
      {
        "path": "/users/foods",
        "component": require('@/pages/users/foods.tsx').default,
        "exact": true
      },
      {
        "path": "/users/mysaled",
        "component": require('@/pages/users/mysaled.tsx').default,
        "exact": true
      },
      {
        "path": "/users/clothes",
        "component": require('@/pages/users/clothes.tsx').default,
        "exact": true
      },
      {
        "path": "/users/products",
        "component": require('@/pages/users/products.tsx').default,
        "exact": true
      },
      {
        "path": "/users/health",
        "component": require('@/pages/users/health.tsx').default,
        "exact": true
      },
      {
        "path": "/users/visitingService",
        "component": require('@/pages/users/visitingService.tsx').default,
        "exact": true
      },
      {
        "path": "/users/order",
        "component": require('@/pages/users/order.tsx').default,
        "exact": true
      },
      {
        "path": "/users/petCustody",
        "component": require('@/pages/users/petCustody').default,
        "exact": true
      },
      {
        "path": "/users/updateDoorService",
        "component": require('@/pages/users/updateDoorService.tsx').default,
        "exact": true
      },
      {
        "path": "/users/storevisiting",
        "component": require('@/pages/users/storevisiting.tsx').default,
        "exact": true
      },
      {
        "path": "/users/carts",
        "component": require('@/pages/users/carts.tsx').default,
        "exact": true
      },
      {
        "path": "/users/storevisiting/:id",
        "component": require('@/pages/users/[id].tsx').default,
        "exact": true
      },
      {
        "path": "/users/foods/:foods",
        "component": require('@/pages/users/[foods].tsx').default,
        "exact": true
      },
      {
        "path": "/users/clothes/:clothes",
        "component": require('@/pages/users/[clothes].tsx').default,
        "exact": true
      },
      {
        "path": "/users/products/:products",
        "component": require('@/pages/users/[products].tsx').default,
        "exact": true
      },
      {
        "path": "/users/order/:orderDoorService",
        "component": require('@/pages/users/[orderDoorService].tsx').default,
        "exact": true
      },
      {
        "path": "/users/order/shopping/:orderDetail",
        "component": require('@/pages/users/[orderDetail].tsx').default,
        "exact": true
      },
      {
        "path": "/users/mysaled/:saledDetail",
        "component": require('@/pages/users/[saledDetail].tsx').default,
        "exact": true
      },
      {
        "path": "/users/order/manage/:manageDetail",
        "component": require('@/pages/users/item/[manageDetail].tsx').default,
        "exact": true
      },
      {
        "component": require('@/exception/404/index.tsx').default,
        "exact": true
      }
    ]
  },
  {
    "path": "/admin",
    "component": require('@/layouts/admin.tsx').default,
    "routes": [
      {
        "path": "/admin/infoModify",
        "component": require('@/pages/admin/infoModify.tsx').default,
        "exact": true
      },
      {
        "path": "/admin/orderManage",
        "component": require('@/pages/admin/orderManage.tsx').default,
        "exact": true
      },
      {
        "path": "/admin/orderManage/:doorService",
        "component": require('@/pages/admin/[doorService].tsx').default,
        "exact": true
      },
      {
        "path": "/admin/saledManage",
        "component": require('@/pages/admin/saledManage.tsx').default,
        "exact": true
      },
      {
        "path": "/admin/saledManage/shopping/:myShop",
        "component": require('@/pages/admin/[myShop].tsx').default,
        "exact": true
      },
      {
        "path": "/admin/saledManage/:saledManage",
        "component": require('@/pages/admin/[saledManage].tsx').default,
        "exact": true
      },
      {
        "path": "/admin/storesManage",
        "component": require('@/pages/admin/storesManage.tsx').default,
        "exact": true
      },
      {
        "path": "/admin/infoModify/:id",
        "component": require('@/pages/admin/[id].tsx').default,
        "exact": true
      },
      {
        "path": "/admin/updateDoorService",
        "component": require('@/pages/admin/updateDoorService.tsx').default,
        "exact": true
      },
      {
        "component": require('@/exception/404/index.tsx').default,
        "exact": true
      }
    ]
  },
  {
    "path": "/stores",
    "component": require('@/layouts/stores.tsx').default,
    "routes": [
      {
        "path": "/stores/orderManage",
        "component": require('@/pages/stores/orderManage.tsx').default,
        "exact": true
      },
      {
        "path": "/stores/petInfoManage",
        "component": require('@/pages/stores/petInfoManage.tsx').default,
        "exact": true
      },
      {
        "path": "/stores/goodsManage",
        "component": require('/src/pages/stores/goodsManage.tsx').default,
        "exact": true
      },
      {
        "path": "/stores/goodsManage/:id",
        "component": require('@/pages/stores/[id].tsx').default,
        "exact": true
      },
      {
        "path": "/stores/doorService",
        "component": require('@/pages/stores/doorService.tsx').default,
        "exact": true
      },
      {
        "path": "/stores/doorService/:doorService",
        "component": require('@/pages/stores/[doorService].tsx').default,
        "exact": true
      },
      {
        "path": "/stores/petInfoManage/:pet",
        "component": require('@/pages/stores/[pet].tsx').default,
        "exact": true
      },
      {
        "path": "/stores/orderManage",
        "component": require('@/pages/stores/orderManage.tsx').default,
        "exact": true
      },
      {
        "path": "/stores/orderManage/:orderDoorService",
        "component": require('@/pages/stores/[orderDoorService].tsx').default,
        "exact": true
      },
      {
        "path": "/stores/orderManage/shopping/:orderDetail",
        "component": require('@/pages/stores/[orderDetail].tsx').default,
        "exact": true
      },
      {
        "component": require('@/exception/404/index.tsx').default,
        "exact": true
      }
    ]
  },
  {
    "path": "/changePassword",
    "component": require('@/public/changePassword.tsx').default,
    "exact": true
  },
  {
    "path": "/fixInfo",
    "component": require('@/pages/fixInfo.tsx').default,
    "exact": true
  },
  {
    "path": "/register",
    "component": require('@/pages/register/register.tsx').default,
    "exact": true
  }
];

  // allow user to extend routes
  plugin.applyPlugins({
    key: 'patchRoutes',
    type: ApplyPluginsType.event,
    args: { routes },
  });

  return routes;
}
