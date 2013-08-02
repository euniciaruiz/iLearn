import pygame
from pygame.locals import*
import data, util
from gui import MenuButton
from delay_switch import DelaySwitch
from question import Question

class Game:
    def __init__(self, screen, screen_size):
        self.screen = screen
        self.screen_size = screen_size
        self.running = True
        self.clock = pygame.time.Clock()
        self.delay = DelaySwitch(120)
        self.font = pygame.font.SysFont(pygame.font.get_default_font(), 50)

        self.bg_color = [150,150,150]
        self.new_bg_color=self.bg_color
        self.screen.fill(self.bg_color)

        self.reset()

    def reset(self):
        self.question = Question(self)

    def change_bg_color(self, color):
        self.new_bg_color = color

    def main(self):
        # RUN MAIN LOOP
        while True:
            self.events = pygame.event.get()
            self.keys=pygame.key.get_pressed()
            self.mouse_pos=pygame.mouse.get_pos()
            self.mouse_but = pygame.mouse.get_pressed()
            self.rects=[]


            #UPDATE
            self.question.update()


            #RENDER
            if not self.delay.drop_frame:
                self.question.render()

                pygame.display.flip()

                if self.bg_color!=self.new_bg_color:
                    self.bg_color = self.new_bg_color
                    self.screen.fill(self.bg_color)
                else:
                    for rect in self.rects:
                        self.screen.fill(self.bg_color, rect)


            #EVENT HANDLER UPDATE
            for event in self.events:
                if event.type==KEYDOWN or event.type==QUIT:
                    if event.type==QUIT or event.key==K_ESCAPE:
                        pygame.quit()
                        return

            self.delay.update()
