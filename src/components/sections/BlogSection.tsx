
import React from 'react';
import { ArrowRight, CalendarDays, Clock } from 'lucide-react';

const blogPosts = [
  {
    id: 1,
    title: "10 Ways to Boost Team Productivity with StreamLine",
    excerpt: "Discover practical strategies to enhance your team's workflow efficiency and collaboration using StreamLine's powerful features.",
    image: "https://images.unsplash.com/photo-1488590528505-98d2b5aba04b",
    date: "May 12, 2023",
    readTime: "5 min read",
    category: "Productivity"
  },
  {
    id: 2,
    title: "How AI is Transforming Project Management",
    excerpt: "Explore how artificial intelligence is revolutionizing project management and how you can leverage it to streamline your workflows.",
    image: "https://images.unsplash.com/photo-1581091226825-a6a2a5aee158",
    date: "Apr 28, 2023",
    readTime: "7 min read",
    category: "Technology"
  },
  {
    id: 3,
    title: "The Future of Remote Work: Tools and Strategies",
    excerpt: "Learn about the emerging trends in remote work and the essential tools needed to maintain productivity and team cohesion.",
    image: "https://images.unsplash.com/photo-1461749280684-dccba630e2f6",
    date: "Apr 14, 2023",
    readTime: "6 min read",
    category: "Remote Work"
  }
];

const BlogSection = () => {
  return (
    <section id="blog" className="section-padding bg-streamline-50">
      <div className="container mx-auto px-4 md:px-6">
        {/* Section Header */}
        <div className="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
          <div className="max-w-2xl mb-6 md:mb-0 animate-fade-in">
            <h2 className="text-3xl md:text-4xl font-display font-bold text-gray-900 mb-4">
              Latest from Our Blog
            </h2>
            <p className="text-xl text-gray-600 text-balance">
              Insights, tips, and strategies to help you maximize your productivity.
            </p>
          </div>
          <a href="#" className="text-streamline-600 font-medium flex items-center hover:text-streamline-700 transition-colors animate-fade-in">
            View all articles
            <ArrowRight className="ml-2 h-4 w-4" />
          </a>
        </div>
        
        {/* Blog Posts Grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {blogPosts.map((post, index) => (
            <article 
              key={post.id} 
              className="bg-white rounded-xl shadow-subtle overflow-hidden group animate-fade-in"
              style={{ animationDelay: `${(index + 1) * 200}ms` }}
            >
              {/* Image */}
              <div className="relative aspect-[16/9] overflow-hidden">
                <img 
                  src={post.image} 
                  alt={post.title} 
                  className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                  loading="lazy"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <span className="absolute top-4 left-4 bg-streamline-600 text-white text-xs font-medium px-2.5 py-1 rounded-full">
                  {post.category}
                </span>
              </div>
              
              {/* Content */}
              <div className="p-6">
                <h3 className="text-xl font-semibold text-gray-900 mb-3 group-hover:text-streamline-600 transition-colors">
                  <a href="#">{post.title}</a>
                </h3>
                <p className="text-gray-600 mb-4">
                  {post.excerpt}
                </p>
                
                {/* Meta */}
                <div className="flex items-center text-sm text-gray-500">
                  <div className="flex items-center mr-4">
                    <CalendarDays className="h-4 w-4 mr-1" />
                    {post.date}
                  </div>
                  <div className="flex items-center">
                    <Clock className="h-4 w-4 mr-1" />
                    {post.readTime}
                  </div>
                </div>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

export default BlogSection;
