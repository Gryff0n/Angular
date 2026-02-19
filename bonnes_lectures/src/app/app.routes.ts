import { Routes } from '@angular/router';
import { About } from './about/about';
import { Welcome } from './welcome/welcome';
import { Menu } from './menu/menu';

export const routes: Routes = [{
    path: '',
    component: About
  },{
    path: 'welcome',
    component: Welcome
  },{
    path: 'menu',
    component: Menu
  }];
