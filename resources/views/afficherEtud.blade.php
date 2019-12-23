@extends('layouts.app')

        
        @section('content')
           <afficherEtud-component :eleve="{{$eleve}}"></afficherEtud-component>
           
        @endsection     
         
         
         <script src="/js/app.js"></script>