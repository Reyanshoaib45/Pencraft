
import React, { useEffect } from 'react';
import Header from '../components/layout/Header';
import Footer from '../components/layout/Footer';
import HeroSection from '../components/sections/HeroSection';
import FeaturesSection from '../components/sections/FeaturesSection';
import TestimonialsSection from '../components/sections/TestimonialsSection';
import PricingSection from '../components/sections/PricingSection';
import BlogSection from '../components/sections/BlogSection';
import CtaSection from '../components/sections/CtaSection';
import { useToast } from "../hooks/use-toast";

const Index = () => {
  const { toast } = useToast();

  useEffect(() => {
    // Smooth scroll effect for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href') || '');
        if (target) {
          window.scrollTo({
            top: target.offsetTop - 80, // Adjust for header height
            behavior: 'smooth'
          });
        }
      });
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-fade-in');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Select elements with data-animate attribute
    document.querySelectorAll('[data-animate]').forEach(el => {
      observer.observe(el);
    });

    // Initialize AJAX for comments and likes
    initializeAjaxFunctionality();

    return () => {
      observer.disconnect();
    };
  }, []);

  const initializeAjaxFunctionality = () => {
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', () => {
      // Handle comment form submissions
      const commentForms = document.querySelectorAll('.comment-form');
      commentForms.forEach(form => {
        form.addEventListener('submit', function(e) {
          e.preventDefault();
          const formData = new FormData(this);
          const postId = this.dataset.postId;
          
          fetch(`/posts/${postId}/comments`, {
            method: 'POST',
            body: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Add new comment to the DOM
              const commentsContainer = document.querySelector('.comments-container');
              const newCommentHtml = `
                <div class="comment mb-4 p-4 bg-white rounded shadow">
                  <div class="flex items-center mb-2">
                    <span class="font-semibold">${data.username}</span>
                    <span class="text-gray-500 text-sm ml-2">${data.created_at}</span>
                  </div>
                  <p>${data.comment.content}</p>
                </div>
              `;
              commentsContainer.insertAdjacentHTML('afterbegin', newCommentHtml);
              
              // Clear form
              this.reset();
              
              // Show success toast
              toast({
                title: "Success",
                description: "Your comment has been added",
                variant: "default",
              });
            }
          })
          .catch(error => {
            console.error('Error:', error);
            toast({
              title: "Error",
              description: "Failed to add comment. Please try again.",
              variant: "destructive",
            });
          });
        });
      });

      // Handle like buttons
      const likeButtons = document.querySelectorAll('.like-button');
      likeButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          const postId = this.dataset.postId;
          const countElement = this.querySelector('.like-count');
          
          fetch(`/posts/${postId}/like`, {
            method: 'POST',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Update the like count in the DOM
              countElement.textContent = data.likes;
              
              toast({
                title: "Success",
                description: "Post liked successfully",
                variant: "default",
              });
            }
          })
          .catch(error => {
            console.error('Error:', error);
            toast({
              title: "Error",
              description: "Failed to like post. Please try again.",
              variant: "destructive",
            });
          });
        });
      });

      // Handle dislike buttons
      const dislikeButtons = document.querySelectorAll('.dislike-button');
      dislikeButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          const postId = this.dataset.postId;
          const countElement = this.querySelector('.dislike-count');
          
          fetch(`/posts/${postId}/dislike`, {
            method: 'POST',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Update the dislike count in the DOM
              countElement.textContent = data.dislikes;
              
              toast({
                title: "Success",
                description: "Post disliked successfully",
                variant: "default",
              });
            }
          })
          .catch(error => {
            console.error('Error:', error);
            toast({
              title: "Error",
              description: "Failed to dislike post. Please try again.",
              variant: "destructive",
            });
          });
        });
      });
    });
  };

  return (
    <div className="min-h-screen flex flex-col">
      <Header />
      <main className="flex-grow">
        <HeroSection />
        <FeaturesSection />
        <TestimonialsSection />
        <PricingSection />
        <BlogSection />
        <CtaSection />
      </main>
      <Footer />
    </div>
  );
};

export default Index;
