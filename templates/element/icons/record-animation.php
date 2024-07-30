<style>
.record-icon {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  width: 24px;
  height: 24px;
}

.record-icon::before,
.record-icon::after,
.record-icon span {
  content: '';
  width: 6px;
  background-color: white;
  border-radius: 3px;
  animation: grow-shrink 1.2s ease-in-out infinite;
}

.record-icon::before {
  animation-delay: -0.4s;
}

.record-icon::after {
  animation-delay: -0.8s;
}

@keyframes grow-shrink {
  0%, 100% { height: 30%; }
  50% { height: 100%; }
}
</style>