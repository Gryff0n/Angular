import { Routes } from '@angular/router';
import { Welcome } from './welcome/welcome';
import { About } from './about/about';
import { BookList } from './components/book-list/book-list';
import { BookDetail } from './components/book-detail/book-detail';
import { BookForm } from './components/book-form/book-form';

export const routes: Routes = [
  { path: '', redirectTo: 'welcome', pathMatch: 'full' },
  { path: 'welcome', component: Welcome },
  { path: 'about', component: About },
  { path: 'books', component: BookList },
  { path: 'books/new', component: BookForm },
  { path: 'books/:id', component: BookDetail },
  { path: 'books/:id/edit', component: BookForm },
];